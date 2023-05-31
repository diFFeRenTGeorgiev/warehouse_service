<?php
/**
 * Created by PhpStorm.
 * User: georgiev
 * Date: 31.05.23
 * Time: 23:19
 */

namespace App\Constant;


class PermissionConstant
{
    /**
     * Actual permissions
     *
     * @var string
     */
    const PERMISSION_ACCESS_ADMIN_PANEL = 'access_administration_pages';
    const PERMISSION_MANAGE_SYSTEM = 'manage_system';
    const PERMISSION_VIEW_FINANCIAL_INFO = 'view_financial_information';
    const PERMISSION_VIEW_USERS = 'view_users';
    const PERMISSION_VIEW_ORDERS = 'view_orders';
    const PERMISSION_MANAGE_ORDERS = 'manage_orders';
    const PERMISSION_MANAGE_USERS = 'manage_users';
    const PERMISSION_MANAGE_PRODUCTS = 'manage_products';
    const PERMISSION_MANAGE_ACL = 'manage_acl';
    const PERMISSION_MANAGE_DOSSIERS = 'manage_dossiers';
    const PERMISSION_TRANSLATE = 'translate';
    const PERMISSION_UPLOAD_PROMO_PLAN = 'upload_promo_plan';
    const PERMISSION_VIEW_CALL_CENTER_PAYMENT_METHODS = 'view_call_center_payment_methods';
    const PERMISSION_VIEW_STORE_SALES_PAYMENT_METHODS = 'view_store_sales_payment_methods';
    const PERMISSION_VIEW_NOT_ENABLED_PRODUCTS = 'view_not_enabled_products';
    const PERMISSION_MASS_PRODUCT_ORDERING = 'mass_product_ordering';
    const PERMISSION_PRINT_LABELS = 'print_labels';
    const PERMISSION_MANAGE_ACL_PERMISSIONS = 'manage_acl_permissions';
    const PERMISSION_MANAGE_VOUCHERS = 'manage_vouchers';
    const PERMISSION_MANAGE_CITIES = 'manage_cities';
    const PERMISSION_VIEW_PRODUCT_STOCK = 'view_product_stock';
    const PERMISSION_VIEW_PRODUCTS_LIST = 'view_products_list';
    const PERMISSION_MANAGE_DISCOUNT_CODES = 'manage_discount_codes';
    const PERMISSION_MANAGE_FEEDBACK_USER_ASSIGNMENT = 'manage_feedback_user_assignment';
    const PERMISSION_MANAGE_PAGES = 'manage_pages';
    const PERMISSION_VIEW_SAMPLE_ORDERS = 'view_sample_orders';
    const PERMISSION_MANAGE_LAYOUT_BLOCKS = 'manage_layout_blocks';
    const PERMISSION_MANAGE_FILES = 'manage_files';
    const PERMISSION_MANAGE_DECO_ORDERS = 'manage_deco_orders';
    const PERMISSION_MANAGE_BLOG = 'manage_blog';
    const PERMISSION_MANAGE_CALL_CENTER_USERS = 'manage_call_center_users';
    const PERMISSION_VIEW_TASKS = 'view_tasks';
    const PERMISSION_MANAGE_TASKS = 'manage_tasks';
    const PERMISSION_VIEW_PRODUCTS_WITH_SUPPLIER_VIDENOV = 'view_products_with_supplier_videnov';
    const PERMISSION_VIEW_QUARANTINED_PRODUCTS = 'view_quarantined_products';
    const PERMISSION_VIEW_FEEDBACK = 'view_feedback';
    const PERMISSION_MANAGE_UTM = 'manage_utm';
    const PERMISSION_MANAGE_SUPPLIERS = 'manage_suppliers';

    /**
     * Maps permissions to their description
     */
    const PERMISSION_DESCRIPTIONS = [
        self::PERMISSION_ACCESS_ADMIN_PANEL => 'Минимално, задължително правомощие, за да може даден потребител да има достъп до /admin частта на уебсайта.',
        self::PERMISSION_MANAGE_SYSTEM => 'Най-висше правомощие за работа с уебсайта.',
        self::PERMISSION_VIEW_FINANCIAL_INFO => 'Достъп до финансовите справки.',
        self::PERMISSION_VIEW_USERS => 'Достъп до данните на клиентите.',
        self::PERMISSION_VIEW_ORDERS => 'Достъп до всички поръчки.',
        self::PERMISSION_MANAGE_ORDERS => 'Достъп и управление на поръчките (редактиране и т.н.).',
        self::PERMISSION_MANAGE_USERS => 'Най-висше правомощие за работа с потребители.',
        self::PERMISSION_MANAGE_PRODUCTS => 'Най-висше правомощие за работа с продукти.',
        self::PERMISSION_MANAGE_ACL => 'Най-висше правомощие за работа с роли.
                        - може да създава, чете, редактира и изтрива роли;
                        Обикновено се дава на роля Administrator.',
        self::PERMISSION_MANAGE_DOSSIERS => 'Правомощие за управление на досиета с потребителски профили.',
        self::PERMISSION_TRANSLATE => 'Правомощие за управление на досиета с потребителски профили.',
        self::PERMISSION_UPLOAD_PROMO_PLAN => 'Право да се менажират промо-плановете за цените на продуктите.',
        self::PERMISSION_VIEW_CALL_CENTER_PAYMENT_METHODS => 'Вижда методи за плащане, които са достъпни само за продавач-консултантите в Call center отдела.',
        self::PERMISSION_VIEW_STORE_SALES_PAYMENT_METHODS => 'Вижда методи за плащане, които са достъпни само за продавач-консултантите във физическите магазини.',
        self::PERMISSION_VIEW_NOT_ENABLED_PRODUCTS => 'Потребителя може да вижда непубликуваните продукти в сайта.',
        self::PERMISSION_MASS_PRODUCT_ORDERING => 'Масова подреба на продуктите.',
        self::PERMISSION_PRINT_LABELS => 'Може да разпечтва етикети за продуктите.',
        self::PERMISSION_MANAGE_ACL_PERMISSIONS => 'Може да редактира правата на различните роли.',
        self::PERMISSION_MANAGE_VOUCHERS => 'Управление на издаваните ваучери',
        self::PERMISSION_MANAGE_CITIES => 'Може да редактира градове.',
        self::PERMISSION_VIEW_PRODUCT_STOCK => 'Може да вижда наличности на продуктите.',
        self::PERMISSION_VIEW_PRODUCTS_LIST => 'Може да вижда списъка с продуктите в администраторския панел.',
        self::PERMISSION_MANAGE_DISCOUNT_CODES => 'Управление на кодовете за отстъпка.',
        self::PERMISSION_MANAGE_FEEDBACK_USER_ASSIGNMENT => 'Потребителят можа да добавя служители към Обратна връзка.',
        self::PERMISSION_MANAGE_PAGES => 'Потребителят има правомощия да управлява страници.',
        self::PERMISSION_VIEW_SAMPLE_ORDERS => 'Достъп и направа на заявки за мостри',
        self::PERMISSION_MANAGE_LAYOUT_BLOCKS => 'Може да редактира блокове',
        self::PERMISSION_MANAGE_FILES => 'Може да оперира с медийни файлове от публичната директория',
        self::PERMISSION_MANAGE_DECO_ORDERS => 'Достъп и управление на поръчките на АКСЕСОАРИ',
        self::PERMISSION_MANAGE_BLOG => 'Може да управлява блог статии',
        self::PERMISSION_MANAGE_CALL_CENTER_USERS => 'Може да назначава поръчки към потребители от колцентър',
        self::PERMISSION_VIEW_TASKS => 'Може да вижда списъка със задачите за разработка',
        self::PERMISSION_MANAGE_TASKS => 'Може да менажира задачите за разработка',
        self::PERMISSION_VIEW_PRODUCTS_WITH_SUPPLIER_VIDENOV => 'Може да разглежда продуктите с доставчик Виденов Груп ЕООД',
        self::PERMISSION_VIEW_QUARANTINED_PRODUCTS => 'Може да разглежда списък с карантинирани продукти',
        self::PERMISSION_VIEW_FEEDBACK => 'Може да разглежда списъци с обратна връзка за поръчки или магазини и продавач-консултанти',
        self::PERMISSION_MANAGE_UTM => 'Може да управлява вътрешното маркиране на сайта',
        self::PERMISSION_MANAGE_SUPPLIERS => 'Потребителят има правомощия да управлява списъка с доставчиците.'
    ];
}