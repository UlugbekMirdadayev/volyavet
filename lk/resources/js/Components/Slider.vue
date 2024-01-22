<template>
    <div class="carousel">
        <button class="carousel-arrow prev" @click="prevSlide">&#8249;</button>
        <div class="carousel-wrapper" :style="{ transform: `translateX(-${currentIndex * slideWidth}%)` }">
            <div
                v-for="(item, index) in items"
                :key="index"
                class="carousel-slide"
                :style="{ width: slideWidth + '%' }"
            >
                <!-- Тут ваш контент для слайдов -->

                <div class="carousel-item">
                    <div class="cl-card">
                        <a :href="'https://volyavet.ru/news/'+item.id"><img class="cc-img" width="225" height="225" :src="item.image" :alt="item.title"></a>
                        <div class="cl-title">
                            <p>{{ item.title }}</p>
                            <a :href="'https://volyavet.ru/news/'+item.id" class="cl-btnH">Перейти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-arrow next" @click="nextSlide">&#8250;</button>
        <!-- Активные точки -->
        <hr class="absolute bottom-6 h-1 w-[99%] right-0 border-t-[#D1FDFF]">
        <div class="carousel-dots">
            <span
                v-for="(item, index) in items"
                :key="index"
                :class="{ active: index === currentIndex }"
                class="dot"
                @click="goToSlide(index)"
            ></span>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted, onBeforeUnmount, computed} from 'vue';

const items = ref(null);
axios.get('getNews').then(resp => {
    console.log(resp)
    items.value = resp.data.data
})
    .catch(error => {
        console.log(error);
    });
const currentIndex = ref(0);
const windowWidth = ref(window.innerWidth)
let slideWidth = windowWidth.value >= 1400 ? 100 / 5 : (windowWidth.value >= 767 ? 100 / 3 : 100); // Рассчитываем ширину слайда в процентах

const handleResize = () => {
    if (windowWidth.value >= 1400) {
        slideWidth = 100 / 5;
    } else if (windowWidth.value >= 767) {
        slideWidth = 100 / 3;
    } else {
        slideWidth = 100;
    }
    windowWidth.value = window.innerWidth
}
onMounted(() => {
    window.addEventListener('resize', handleResize)
});
onBeforeUnmount(() => {
    window.removeEventListener('resize', handleResize)
});
const normalDate = ((date) => {
    const Gdate = new Date(date); // Измените это на вашу дату или используйте переданную переменную date

    const day = Gdate.getDate();
    const month = Gdate.getMonth() + 1; // Так как месяцы в JavaScript нумеруются с , нужно добавить 1
    const year = String(Gdate.getFullYear());

    return `${day}.${month > 10 ? month : "0" + month }.${year.slice(-2, 4)}`;
})
const nextSlide = () => {
    currentIndex.value = (currentIndex.value + 1) % items.value.length;
};

const prevSlide = () => {
    currentIndex.value = (currentIndex.value - 1 + items.value.length) % items.value.length;
};

const goToSlide = (index) => {
    currentIndex.value = index;
};


</script>

<style scoped lang="less">
.carousel {
    border-radius: 20px;
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
    overflow: hidden;
    width: 100%;
    //text-align: center;
}

.carousel-wrapper {
    display: flex;
    transition: transform 0.5s ease;
}

.carousel-slide {
    @media (min-width: 767px) {
        flex: 0 0 calc(100% / 3); /* Задаем ширину слайда */
        width: calc(100% / 3);
    }
    @media (min-width: 1400px) {
        flex: 0 0 calc(100% / 5); /* Задаем ширину слайда */
        width: calc(100% / 5);
    }

    flex: 0 0 calc(100%); /* Задаем ширину слайда */
    width: calc(100%);
    padding: 0 10px;

    .carousel-item {

        .cl-card {
            transition: .2s all;

            &:hover {
                transform: scale(.98);
            }

            .cc-img {
                border-radius: 20px;
                width: 100%;
            }

            .cl-title {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                &:hover {
                    transition: 2s all;

                    & p {
                        opacity: 0;
                        display: none;
                    }
                    & span {
                        opacity: 0;
                        display: none;
                    }

                    .cl-btnH {
                        opacity: 1;
                        display: flex;
                    }
                }

                & p {
                    opacity: 1;
                    transition: .2s all;
                }
                & span {
                    opacity: 1;
                    transition: .2s all;
                }

                padding: 10px;
                background: #212c53;
                border-radius: 20px;
                text-align: left;
                height: 74px;
                color: #bcced0;
                line-height: 19px;
                font-size: 13px;
                p {
                    font-weight: 600;
                    color: #F8F8F8;
                }
                span {
                    &.cl-date {
                        color:#64C1C6;
                    }
                }
                .cl-btnH {
                    opacity: 0;
                    display: none;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    padding: 22px 28px;
                    gap: 10px;
                    height: 56px;
                    text-decoration: none;
                    background: rgba(209, 253, 255, .3);
                    border: 2px solid #d1fdff;
                    border-radius: 7px;
                    font-weight: 700;
                    font-size: 16px;
                    line-height: 15px;
                    text-align: center;
                    text-transform: uppercase;
                    color: #d1fdff;
                    cursor: pointer;
                    transition: 2s all;
                }
            }
        }
    }
}

.carousel-dots {
    @media (min-width: 500px) {
        width: 340px;
        //transform: translateX(5%);
        transform: translate(0px, 10px);
    }
    transform: translate(0px, 10px);
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2rem auto;
    list-style: none;
    background: #2b3762;
    position: relative;
    text-align: center;
    padding-left: 0;
}


.carousel-arrow {
    position: absolute;
    bottom: 20px;
    height: 35px;
    width: 35px;
    background: #212c53;
    border-radius: 50%;
    border: 2px solid #d1fdff;
    color: #d1fdff;
    font-size: 26px;
    line-height: 0;
    z-index: 9;
    cursor: pointer;
}

.carousel-arrow.prev {

    @media (min-width: 500px) {
        left: 20%;
    }
    @media (min-width: 768px) {
        left: 30%;
    }
    @media (min-width: 1000px) {
        left: 35%;
        bottom: 10px;
    }
    @media (min-width: 1400px) {
        left: 40%;
        bottom: 10px;
    }
    bottom: 15px;
    padding-bottom: 3px;
    padding-right: 2px;
    left: 15px;
    margin-right: 8px;

}

.carousel-arrow.next {

    @media (min-width: 500px) {
        right: 20%;
    }
    @media (min-width: 768px) {
        right: 30%;
    }
    @media (min-width: 1000px) {
        right: 35%;
        bottom: 10px;
    }
    @media (min-width: 1400px) {
        right: 40%;
        bottom: 10px;
    }
    right: 15px;
    bottom: 15px;
    padding-bottom: 3px;
    padding-left: 2px;
    margin-left: 8px;
}


.dot {
    width: 10px;
    height: 10px;
    margin: 0 7px;
    cursor: pointer;
    background-color: #0000;
    border: 2px solid #d1fdff;
    border-radius: 50%;
}

.dot.active {
    width: 15px;
    height: 15px;
    background: rgba(100, 193, 198, .3);
    border: 2px solid #d1fdff;
}
</style>
