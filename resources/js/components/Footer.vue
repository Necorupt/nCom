<template>
    <footer>

        <div class="footer__top">
        </div>
        <div class="footer__mid">
            <h5 class="footer__string">© 2024</h5>
            <a href="/policy" class="footer__link">Политика конфиденциальности</a>
            <a href="" class="footer__link">Политика обработки персональных данных</a>
            <a href="" class="footer__link"></a>
        </div>
        <div class="footer__bottom">
            <h5 class="footer__string">Мы используем файлы cookie, разработанные нашими специалистами и третьими лицами,
                для
                анализа событий на нашем веб-сайте, что позволяет нам улучшать взаимодействие с пользователями и
                обслуживание. Продолжая просмотр страниц нашего сайта, вы принимаете условия его использования. Более
                подробные сведения смотрите в нашей Политике в отношении файлов Cookie.
            </h5>
        </div>
    </footer>

</template>

<style lang="scss" scoped>
footer {
    margin-top: 200px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.footer {
    &__top {
        display: flex;
        flex-direction: row;
        gap: 24px;
    }

    &__mid {
        display: flex;
        flex-direction: row;
        gap: 24px;

        padding-left: 24px;
        padding-right: 24px;


        justify-content: space-between;
        align-items: center;
        padding-left: 200px;
        padding-right: 200px;
    }

    &__bottom {
        display: flex;
        flex-direction: row;
        gap: 24px;

        padding-left: 24px;
        padding-right: 24px;
    }
}
</style>
