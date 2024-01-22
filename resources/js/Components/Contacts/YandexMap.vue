<script setup>

import less from 'less';

</script>

<template>
        <div style="position:relative;overflow:hidden;"><a
            href="https://yandex.ru/maps/org/volyavet/225599149948/?utm_medium=mapframe&utm_source=maps"
            style="color:#eee;font-size:12px;position:absolute;top:0px;">VolyaVet</a><a
            href="https://yandex.ru/maps/10758/himki/category/veterinary_clinic/184107216/?utm_medium=mapframe&utm_source=maps"
            style="color:#eee;font-size:12px;position:absolute;top:14px;">Ветеринарная клиника в
            Химках</a><a
            href="https://yandex.ru/maps/10758/himki/category/veterinary_pharmacy/184107214/?utm_medium=mapframe&utm_source=maps"
            style="color:#eee;font-size:12px;position:absolute;top:28px;">Ветеринарная аптека в
            Химках</a>
            <iframe class="contactsSection__map"
                    src="https://yandex.ru/map-widget/v1/?ll=37.414378%2C55.916983&mode=poi&poi%5Bpoint%5D=37.414528%2C55.917060&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D225599149948&tilt=0.8726646259971648&z=19.49"
                    width="560" height="400" frameborder="1" allowfullscreen="true"
                    style="position:relative;"></iframe>
        </div>
</template>

<style scoped lang="less">
.contactsSection__map {
    @media(min-width: 768px) {
        height: 295px;
        width: 100%;
        margin: 0;
    }
    @media(min-width: 1440px) {
        height: 220px;
        width: 100%;
    }
    height: 480px;
    width: 100%;
    margin-top: 30px;
    border-radius: 10px;
}
</style>
