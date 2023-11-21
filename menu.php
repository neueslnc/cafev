<div class="nav-container">
    <div class="mobile-topbar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"></h4><?php showTitle() ;  ?> </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Главная</div>
                </a>
                <ul>
                    <li> <a href="index.php"><i class="bx bx-right-arrow-alt"></i>Ингредиенты</a>
                    </li>
                    <li> <a href="add_ingredient.php"><i class="bx bx-right-arrow-alt"></i>Добавить ингредиент</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Готовый продукт</div>
                </a>
                <ul>
                    <li> <a href="all_products.php"><i class="bx bx-right-arrow-alt"></i>Все продукты</a>
                    </li>
                    <li> <a href="add_product.php"><i class="bx bx-right-arrow-alt"></i>Добавить новое название</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Продажа</div>
                </a>
                <ul>
                    <li> <a href="add_sale.php"><i class="bx bx-right-arrow-alt"></i>Новая продажа</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Админ</div>
                </a>
                <ul>
                    <li> <a href="all_sales.php"><i class="bx bx-right-arrow-alt"></i>Отчеты</a>
                    <li> <a href="all_sales_payment.php"><i class="bx bx-right-arrow-alt"></i>Отчеты Зарплата</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>