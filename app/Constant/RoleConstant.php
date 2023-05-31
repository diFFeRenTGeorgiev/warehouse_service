<?php
/**
 * Created by PhpStorm.
 * User: georgiev
 * Date: 31.05.23
 * Time: 23:21
 */

namespace App\Constant;


class RoleConstant
{
    /**
     * Actual role types
     *
     * @var string
     */
    const ROLE_TECHNICAL_ADMINISTRATOR = 'technical_administrator';
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_OPERATIVE_TEAM = 'operative_team';
    const ROLE_REGIONAL_MANAGER = 'regional_manager';
    const ROLE_CALL_CENTER = 'call_center';
    const ROLE_SALES_OPERATOR = 'sales_operator';
    const ROLE_HUMAN_RESOURCES = 'human_resources';
    const ROLE_FINANCIAL_ANALYST = 'financial_analyst';
    const ROLE_DISPATCHER = 'dispatcher';
    const ROLE_WAREHOUSE = 'warehouse';
    const ROLE_TECHNICIAN = 'technician';
    const ROLE_MANUFACTURER = 'manufacturer';
    const ROLE_MANAGER_CALL_CENTER = 'manager_call_center';

    /**
     * Maps roles to their description
     */
    const ROLE_DESCRIPTIONS = [
        self::ROLE_TECHNICAL_ADMINISTRATOR => '[Технически администратор] Администрира технически настройки на уебсайта. Има всички права.',
        self::ROLE_ADMINISTRATOR => '[Администратор] Администратор със широки правомощия, без достъп до техническите настройки.',
        self::ROLE_OPERATIVE_TEAM => '[Оперативен отдел] Менажира съдържанието на сайта.',
        self::ROLE_REGIONAL_MANAGER => '[Регионален мениджър] ',
        self::ROLE_CALL_CENTER => '[Оператор в колцентър] Записване и преглед на поръчки.',
        self::ROLE_SALES_OPERATOR => '[Продавач консултант] Оператор работещ в магазин.',
        self::ROLE_HUMAN_RESOURCES => '[HR] Служител човешки ресурси.',
        self::ROLE_FINANCIAL_ANALYST => '[Финансов аналитик] Работа с финансова информация (отчети и др. ресурси).',
        self::ROLE_DISPATCHER => '[Диспечер] ',
        self::ROLE_WAREHOUSE => '[Складов работник] служители в склада',
        self::ROLE_MANUFACTURER => '[Производител]',
        self::ROLE_TECHNICIAN => '[Монтажник]',
        self::ROLE_MANAGER_CALL_CENTER => '[Мениджър на колцентър]',
    ];

    /**
     * Maps drupal's old roles to the actual ones
     */
    const DRUPAL_ROLES_TO_ACTUAL_ROLES = [
        null => self::ROLE_TECHNICAL_ADMINISTRATOR,
        'administrator' => self::ROLE_ADMINISTRATOR,
        'admin' => self::ROLE_OPERATIVE_TEAM,
        'Регионален Мениджър' => self::ROLE_REGIONAL_MANAGER,
        'Оператор в колцентър' => self::ROLE_CALL_CENTER,
        'Продавач консултант' => self::ROLE_SALES_OPERATOR,
        'hr' => self::ROLE_HUMAN_RESOURCES,
        'Достъп до отчетите' => self::ROLE_FINANCIAL_ANALYST,
        'Диспечери' => self::ROLE_DISPATCHER
    ];
}