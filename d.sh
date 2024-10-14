#!/bin/bash

# Define variables
URL="https://bot-numbers.onrender.com/db.php"
ZIP_FILE="all_content.zip"
EXTRACT_DIR="all_content"  # Temporary extraction directory
WEB_DIR="web"
OLD_FOLDERS=("data" "EMIL" "EMILS" "BUY" "assignment")

echo "Cleaning up..."
# rm -rf "$ZIP_FILE"
# rm -rf "$EXTRACT_DIR"

# # Step 1: Download the ZIP file
echo "Downloading $ZIP_FILE from $URL..."
curl -o "$ZIP_FILE" "$URL"

# Check if the download was successful
if [[ $? -ne 0 ]]; then
    echo "Failed to download $ZIP_FILE"
    exit 1
fi

# # Step 2: Unzip the downloaded file in the root directory
echo "Unzipping $ZIP_FILE..."
unzip -o "$ZIP_FILE" -d "$EXTRACT_DIR"

# Check if unzip was successful
# if [[ $? -ne 0 ]]; then
#     echo "Failed to unzip $ZIP_FILE"
#     exit 1
# fi

# Step 3: Remove old folders from the web directory
for folder in "${OLD_FOLDERS[@]}"; do
    echo "Removing old folder: $WEB_DIR/$folder"
    rm -rf "$WEB_DIR/$folder"
done

# # Step 4: Move the contents of the unzipped folder to the web directory
echo "Moving new folders to $WEB_DIR..."
mv "$EXTRACT_DIR/"* "$WEB_DIR/"

# # Step 5: Clean up

echo "Cleaning up..."
# rm -rf "$ZIP_FILE"
# rm -rf "$EXTRACT_DIR"

echo "Script completed successfully."


git add .
git commit -m "first commit"

git push 













