$src = "database\migrations"
$dest = "database\migrations\tenant"

if (!(Test-Path $dest)) {
    New-Item -ItemType Directory -Path $dest
}

$files = @(
"2023_01_01_000001_create_service_categories_table.php"
"2024_01_01_000000_create_shops_table.php"
"2024_05_07_000000_create_invoices_table.php"
"2024_05_07_000001_create_categories_table.php"
"2024_05_07_000001_create_units_table.php"
"2024_05_07_000002_create_brands_table.php"
"2024_05_07_000003_create_products_table.php"
"2024_05_11_002051_create_sellers_table.php"
"2024_05_12_000001_create_persons_table.php"
"2024_05_13_000001_add_customer_id_to_invoices_table.php"
"2025_05_05_165450_create_customers_table.php"
"2025_05_05_165529_create_incomes_table.php"
"2025_05_05_165648_create_expenses_table.php"
"2025_05_07_000001_add_columns_to_products_table.php"
"2025_05_08_042553_add_type_to_categories_table.php"
"2025_05_09_181243_create_provinces_table.php"
"2025_05_09_184747_create_cities_table.php"
"2025_05_10_074702_create_bank_accounts_table.php"
"2025_05_10_190407_create_currencies_table.php"
"2025_05_11_011033_create_seller_bank_accounts_table.php"
"2025_05_11_071453_add_price_to_products_table.php"
"2025_05_11_193651_create_invoice_items_table.php"
"2025_05_11_194732_add_invoice_number_to_invoices_table.php"
"2025_05_12_035154_create_people_table.php"
"2025_05_14_000001_create_sales_table.php"
"2025_05_15_000001_create_customer_purchases_table.php"
"2025_05_16_194835_create_sale_items_table.php"
"2025_05_16_201819_add_purchase_percent_to_persons_table.php"
"2025_05_16_202806_add_photo_to_persons_table.php"
"2025_05_16_211750_add_total_amount_and_discount_to_sales_table.php"
"2025_05_16_212824_update_persons_and_sellers_table.php"
"2025_05_16_213643_update_sales_table_add_amount_fields.php"
"2025_05_16_214415_update_sales_table_add_payment_fields.php"
"2025_05_17_175459_create_activity_log_table.php"
"2025_05_17_175500_add_event_column_to_activity_log_table.php"
"2025_05_17_175501_add_batch_uuid_column_to_activity_log_table.php"
"2025_05_17_180905_create_services_table.php"
"2025_05_19_162909_add_title_to_sales_table.php"
"2025_05_20_063347_add_fields_to_sales_table.php"
"2025_05_20_083428_create_service_fields_table.php"
"2025_05_20_083429_create_service_sales_table.php"
"2025_05_20_091435_create_service_sale_items_table.php"
"2025_05_20_091437_create_service_field_values_table.php"
"2025_05_20_163832_create_service_dynamic_forms_table.php"
"2025_05_21_060822_create_contact_messages_table.php"
"2025_05_21_060917_create_contacts_table.php"
"2025_05_22_131500_add_image_to_services_table.php"
"2025_05_22_131916_add_type_to_products_table.php"
"2025_05_22_140855_add_service_info_to_services_table.php"
"2025_05_22_144530_add_unit_id_to_services_table.php"
"2025_05_22_144910_add_missing_fields_to_services_table.php"
"2025_05_22_191941_add_product_id_to_services_table.php"
"2025_05_22_213857_add_payment_fields_to_sales_table.php"
"2025_05_22_230819_add_share_percent_to_persons_table.php"
"2025_05_22_230852_create_product_shareholder_table.php"
"2025_05_23_001839_create_accounts_table.php"
"2025_05_23_062540_create_sale_returns_table.php"
"2025_05_26_000000_add_paid_at_to_sales_table.php"
"2025_05_26_000000_create_shareholders_table.php"
"2025_05_26_000001_create_sale_return_items_table.php"
"2025_05_26_000002_alter_return_date_nullable_in_sale_returns.php"
"2025_05_26_000002_create_stocks_table.php"
"2025_05_26_000003_alter_sale_returns_customer_id.php"
"2025_05_26_050600_add_payment_columns_to_sales_table.php"
"2025_05_26_060000_add_qty_to_sale_return_items_table.php"
"2025_05_26_060000_create_installments_table.php"
"2025_05_26_060100_add_reason_and_description_to_sale_return_items_table.php"
"2025_05_26_070000_drop_quantity_from_sale_return_items_table.php"
)

foreach ($file in $files) {
    $srcFile = Join-Path $src $file
    $dstFile = Join-Path $dest $file
    if (Test-Path $srcFile) {
        Move-Item $srcFile $dstFile
        Write-Host "Moved: $file"
    } else {
        Write-Host "Not found: $file"
    }
}

Write-Host "Tenant migration files moved successfully."
