
class ServiceManager {
  private $country;
  private $appName;
  private $apiUrl = 'https://5sim.biz';
  private $status;
  private $api;
  
  private $operators = [
      '019', 'activ', 'altel', 'beeline', 'claro', 'ee', 'globe', 'kcell',
      'lycamobile', 'matrix', 'megafon', 'mts', 'orange', 'pildyk', 'play',
      'redbullmobile', 'rostelecom', 'smart', 'sun', 'tele2', 'three', 'tigo',
      'tmobile', 'tnt', 'virginmobile', 'vodafone', 'yota', 'zz'
  ];
  
  private $virtualOperators;
  private $appTranslations;
  private $appMap;
  
  public function __construct($data) {
      $this->initializeData($data);
      $this->initializeAppMaps();
      $this->initializeVirtualOperators();
  }
  
  private function initializeData($data) {
      if (!is_array($data) || count($data) < 5) {
          throw new InvalidArgumentException('Invalid data provided');
      }
      
      $this->appName = $data[1];
      $this->status = $data[2];
      $this->api = str_replace(["Ai"], ["5sim.biz"], $data[3]);
      $this->country = $data[4];
  }
  
  private function initializeAppMaps() {
      // App name translations for API
      $this->appMap = [
          'wa' => 'whatsapp',
          'tg' => 'telegram',
          'fb' => 'facebook',
          'ig' => 'instagram',
          'tw' => 'twitter',
          'lf' => 'tiktok',
          'go' => 'google',
          'im' => 'imo',
          'vi' => 'viber',
          'fu' => 'snapchat',
          'nf' => 'netflix',
          'au' => 'haraj',
          'ot' => 'other'
      ];
      
      // Arabic translations for display
      $this->appTranslations = [
          'A' => 'واتسأب',
          'B' => 'واتسأب',
          'C' => 'تيليجرام',
          'D' => 'فيسبوك',
          'E' => 'إنستقرام',
          'F' => 'تويتر',
          'G' => 'تيك توك',
          'H' => 'قوقل',
          'I' => 'ايمو',
          'J' => 'فايبر',
          'K' => 'سناب شات',
          'L' => 'نيتفلكس',
          'M' => 'حراج',
          'N' => 'السيرفر العام',
          '21' => 'عشوائي واتسأب',
          '22' => 'عشوائي واتسأب',
          '23' => 'عشوائي واتسأب',
          '24' => 'عشوائي واتسأب',
          '25' => 'عشوائي واتسأب',
          '26' => 'عشوائي تيليجرام',
          '27' => 'عشوائي تيليجرام',
          '28' => 'عشوائي تيليجرام',
          '29' => 'عشوائي تيليجرام',
          '30' => 'عشوائي تيليجرام',
          '31' => 'واتسأب المميز',
          '32' => 'واتسأب المميز',
          '33' => 'واتسأب المميز',
          '34' => 'واتسأب المميز',
          '35' => 'واتسأب المميز',
          '36' => 'تيليجرام المميز',
          '37' => 'تيليجرام المميز',
          '38' => 'تيليجرام المميز',
          '39' => 'تيليجرام المميز',
          '40' => 'تيليجرام المميز'
      ];
  }
  
  private function initializeVirtualOperators() {
      $this->virtualOperators = [];
      for ($i = 2; $i <= 37; $i++) {
          $this->virtualOperators[] = "virtual{$i}";
      }
  }
  
  public function processService() {
      // Convert numeric status to letter if needed
      if ($this->status >= 1 && $this->status <= 14) {
          $this->status = $this->convertNumericStatus($this->status);
      }
      
      $normalizedApp = $this->normalizeAppName($this->appName);
      $operators = $this->getAvailableOperators($normalizedApp);
      
      return [
          'app_name' => $this->translateAppName($this->status),
          'operators' => $operators,
          'country' => $this->country,
          'normalized_app' => $normalizedApp
      ];
  }
  
  private function convertNumericStatus($num) {
      $statusMap = [
          1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E',
          6 => 'F', 7 => 'G', 8 => 'H', 9 => 'I', 10 => 'J',
          11 => 'K', 12 => 'L', 13 => 'M', 14 => 'N'
      ];
      return $statusMap[$num] ?? $num;
  }
  
  private function normalizeAppName($app) {
      return $this->appMap[$app] ?? $app;
  }
  
  public function translateAppName($status) {
      return $this->appTranslations[$status] ?? $status;
  }
  
  private function fetchPriceData($type = 'prices') {
      $endpoints = [
          'prices' => "/v1/guest/prices?country={$this->country}&product={$this->appName}",
          'any' => "/v1/guest/products/{$this->country}/any"
      ];
      
      $url = $this->apiUrl . $endpoints[$type];
      
      try {
          $response = @file_get_contents($url);
          if ($response === false) {
              throw new Exception("Failed to fetch data from API");
          }
          return json_decode($response, true);
      } catch (Exception $e) {
          error_log("API Error: " . $e->getMessage());
          return null;
      }
  }
  
  private function getOperatorData($data, $operator) {
      try {
          // For regular price data
          if (isset($data[$this->country][$this->appName][$operator])) {
              $operatorData = $data[$this->country][$this->appName][$operator];
              $count = $operatorData['count'] ?? 0;
              $cost = $operatorData['cost'] ?? 0;
              
              if ($cost > 0 && $count > 0) {
                  return [
                      'name' => $operator,
                      'price_info' => "{$cost} ₽| {$count}"
                  ];
              }
          }
      } catch (Exception $e) {
          error_log("Error processing operator data: " . $e->getMessage());
      }
      
      return null;
  }
  
  public function getAvailableOperators($appName) {
      $data = $this->fetchPriceData('prices');
      if (!$data) {
          return $this->getFallbackOperatorData();
      }
      
      $availableOperators = [];
      
      // Check regular operators
      foreach ($this->operators as $operator) {
          $operatorData = $this->getOperatorData($data, $operator);
          if ($operatorData) {
              $availableOperators[$operatorData['name']] = $operatorData['price_info'];
          }
      }
      
      // Check virtual operators
      foreach ($this->virtualOperators as $virtualOp) {
          $operatorData = $this->getOperatorData($data, $virtualOp);
          if ($operatorData) {
              $availableOperators[$operatorData['name']] = $operatorData['price_info'];
          }
      }
      
      // If no operators found, try fallback
      if (empty($availableOperators)) {
          return $this->getFallbackOperatorData();
      }
      
      return $availableOperators;
  }
  
  private function getFallbackOperatorData() {
      $data = $this->fetchPriceData('any');
      if (!$data || !isset($data->{$this->appName})) {
          return [];
      }
      
      $appData = $data->{$this->appName};
      return [
          'any' => "{$appData->Price} ₽| {$appData->Qty}"
      ];
  }
  
  public function validateCountry($country) {
      // Add country validation logic here
      return !empty($country);
  }
  
  public function validateApp($app) {
      // Add app validation logic here
      return isset($this->appMap[$app]) || in_array($app, $this->appMap);
  }
}