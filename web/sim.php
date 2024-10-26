<?php
class OperatorHandler {
    private $country;
    private $app;
    private $apiData;
    private $baseUrl = 'https://5sim.biz/v1/guest';

    public function __construct($country, $app) {
        $this->country = $country;
        $this->app = $app;
        $this->loadApiData();
    }

    private function loadApiData() {
        // Load prices data
        $pricesUrl = "{$this->baseUrl}/prices?country={$this->country}&product={$this->app}";
        $this->apiData = json_decode(file_get_contents($pricesUrl), true);
        
        // If main data fails, try fetching 'any' product data as fallback
        if (empty($this->apiData)) {
            $anyUrl = "{$this->baseUrl}/products/{$this->country}/any";
            $this->apiData = ['any' => json_decode(file_get_contents($anyUrl), true)];
        }
    }

    public function getOperatorData($operator) {
        if (empty($this->apiData[$this->country][$this->app][$operator])) {
            return null;
        }

        $data = $this->apiData[$this->country][$this->app][$operator];
        return [
            'cost' => $data['cost'] ?? 0,
            'count' => $data['count'] ?? 0,
            'rate' => $data['rate'] ?? 0
        ];
    }

    public function formatOperatorDisplay($operator) {
        $data = $this->getOperatorData($operator);
        if (!$data) {
            return [
                'name' => null,
                'display' => null,
                'callback_data' => null
            ];
        }

        return [
            'name' => $operator,
            'display' => "{$data['cost']}₽| {$data['count']}",
            'callback_data' => "addprice-{$this->app}-{$operator}-{$this->country}"
        ];
    }

    public function getAllOperators() {
        return [
            // Standard operators
            'any', '019', 'activ', 'altel', 'beeline', 'claro', 'ee', 'globe', 
            'kcell', 'lycamobile', 'matrix', 'megafon', 'mts', 'orange', 
            'pildyk', 'play', 'rostelecom', 'smart', 'tele2', 'three', 
            'tigo', 'tmobile', 'vodafone', 'yota',
            // Virtual operators
            'virtual2', 'virtual4', 'virtual5', 'virtual7', 'virtual8', 
            'virtual12', 'virtual15', 'virtual16', 'virtual17', 'virtual18',
            'virtual19', 'virtual20', 'virtual21', 'virtual22', 'virtual23',
            'virtual24', 'virtual25', 'virtual26', 'virtual27', 'virtual28',
            'virtual29', 'virtual30', 'virtual31', 'virtual32', 'virtual33',
            'virtual34', 'virtual35', 'virtual36', 'virtual37'
        ];
    }

    public function generateKeyboard() {
        $keyboard = [];
        $row = [];
        $counter = 0;

        foreach ($this->getAllOperators() as $operator) {
            $opData = $this->formatOperatorDisplay($operator);
            
            // Skip if no data available for this operator
            if (!$opData['name']) {
                continue;
            }

            // Create button array
            $button = [
                ['text' => $opData['display'], 'callback_data' => $opData['callback_data']],
                ['text' => $opData['name'], 'callback_data' => $opData['callback_data']]
            ];

            // Add to keyboard with 2 operators per row
            if ($counter % 2 == 0) {
                if (!empty($row)) {
                    $keyboard[] = $row;
                }
                $row = $button;
            } else {
                $keyboard[] = array_merge($row, $button);
                $row = [];
            }
            $counter++;
        }

        // Add remaining row if exists
        if (!empty($row)) {
            $keyboard[] = $row;
        }

        return $keyboard;
    }

    public function sendResponse($chat_id, $message_id, $name, $APP, $API) {
        $debug_info = $this->getDebugInfo();
        
        bot('EditMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "
🎗 - تم حفظ الدولة والتطبيق ✅

☑️ - الدولة: $name 
✳️ - التطبيق: $APP 
🌐 - الموقع: $API 

Debug Info:
$debug_info

🅿️ - قم ب إختيار السيرفر لهذه الدولة ⏬
",
            'reply_markup' => json_encode([
                'inline_keyboard' => $this->generateKeyboard()
            ])
        ]);
    }

    private function getDebugInfo() {
        return "- API Status: " . ($this->apiData ? 'Success' : 'Failed') . "\n" .
               "- Country: {$this->country}\n" .
               "- App: {$this->app}\n" .
               "- Available Operators: " . count($this->generateKeyboard());
    }
}

// Example usage in your main code:
function handleOperatorSelection($exdata, $chat_id, $message_id, $name, $APP, $API) {
    if ($exdata[0] == "addservice") {
        $app = $exdata[1];
        $country = $exdata[4];
        
        // Convert app name if needed
        $app_5sim = str_replace(
            ["wa", "tg", "fb", "ig", "tw", "lf", "go", "im", "vi", "fu", "nf", "au", "ot"],
            ["whatsapp", "telegram", "facebook", "instagram", "twitter", "tiktok", "google", 
             "imo", "viber", "snapchat", "netflix", "haraj", "other"],
            $app
        );

        // Initialize handler
        $handler = new OperatorHandler($country, $app_5sim);
        
        // Send response
        $handler->sendResponse($chat_id, $message_id, $name, $APP, $API);
    }
}