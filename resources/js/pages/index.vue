<template>
    <div>
        <div class="main__block_circle_left"></div>
        <div class="container">
            <div class="main__block">
                <div class="main__block_right -mobile">
                    <div class="main__block_right_four"><img src="/images/main-right-mobil-mb.png"></div>
                </div>
                <div class="main__block_left">
                    <Transition appear name="fadeLeft">
                        <div class="main__block_left_logo"><span>Day</span><span>Pay</span></div>
                    </Transition>
                    <Transition
                        appear
                        name="fadeLeft"
                    >
                        <div class="main__block_left_subtitle">Хотели бы вы получать зарплату каждый день?</div>
                    </Transition>
                    <Transition
                        appear
                        name="fadeLeft"
                    >
                        <a href="#form" class="main__block_left_btn">Начать получать
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10 19.2498C15.108 19.2498 19.25 15.1088 19.25 9.99976C19.25 4.89176 15.108 0.749756 10 0.749756C4.892 0.749756 0.75 4.89176 0.75 9.99976C0.75 15.1088 4.892 19.2498 10 19.2498Z"
                                      stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.55762 13.4709L12.0436 9.99995L8.55762 6.52895" stroke="white"
                                      stroke-width="1.5"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </Transition>

                </div>
                <div class="main__block_right -desktop">
                    <div class="main__block_right_three " id="imgParallax"><img data-depth="0.8"
                                                                                src="/images/main-right-loop.png"></div>

                    <div class="main__block_right_two " id="imgParallax1"><img data-depth="0.5"
                                                                               src="/images/main-right-figures.png">
                    </div>

                    <div class="main__block_right_one " id="imgParallax2"><img data-depth="0.9"
                                                                               src="/images/main-right-mobile.png">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="main__block_circle_right"></div>
            <div class="main__block_footer">
                <div class="container">
                    <img src="/images/main-block-footer.svg" alt="">
                </div>
            </div>
            <div class="container">
                <div class="main__block_calendar">
                    <div class="main__block_calendar_img"><img src="/images/icons/calendar-blue.png"></div>
                    <div class="main__block_calendar_description">
                        Как часто при острой необходимости в деньгах у вас нет возможности получить заработанные
                        деньги
                        раньше дня выдачи зарплаты?
                    </div>
                </div>
            </div>
        </div>
        <div class="what_is__block">
            <div class="container">
                <div class="light__blue_out">
                    <div class="light__blue">
                        <div class="light__blue__img"><img src="/images/icons/light-blue.png"></div>
                        <div class="light__blue__description">С сервисом DayPay деньги за отработанный период можно
                            получить в любой момент!
                        </div>
                        <div class="light__blue__btns">
                            <a href="#form" class="light__blue__btn">
                                Начать получать
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M10 19.2498C15.108 19.2498 19.25 15.1088 19.25 9.99976C19.25 4.89176 15.108 0.749756 10 0.749756C4.892 0.749756 0.75 4.89176 0.75 9.99976C0.75 15.1088 4.892 19.2498 10 19.2498Z"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M8.55762 13.4709L12.0436 9.99995L8.55762 6.52895" stroke="white"
                                          stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="what_is__section" id="what_is__section">
                <div class="what_is__bg-title"></div>
                <div class="container">
                    <div class="what_is__flex">
                        <div class="what_is__image -mobile">
                            <img src="/images/what-is-mobile-2.png"/>
                        </div>
                        <div class="what_is__description">
                            <Transition
                                appear
                                name="fadeLeft"
                            >
                                <div>
                                    <span>Что такое DayPay?</span>
                                    <p>DayPay - это сервис, который предоставляет вам возможность управлять своей
                                        заработной
                                        платой.</p>
                                    <p>Вы можете в любой момент получить заработную плату за отработанный период через
                                        сервис
                                        DayPay.</p>
                                </div>
                            </Transition>

                        </div>
                        <div class="what_is__image -desktop" id="imgParallax3">

                            <img data-depth="0.8" src="/images/what-is-image.png"/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="__how">
                <div class="container">
                    <h3>Как это работает?</h3>
                    <div class="__video">
                        <div class="play video-btn" v-show="frame" v-on:click="frame=!frame">
                            <img src="/images/icons/play.png" alt="">
                        </div>
                        <img v-show="frame" src="/images/bg_video.png" alt="">
                        <iframe v-show="!frame" class="embed-responsive-item" src="" id="video"
                                allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="__requirements">
            <div class="container">
                <div class="__requirements_title">
                    Наши преимущества
                </div>
                <div class="row __requirements_first_list" name="fadeLeft">
                    <div class="col-md-4" v-for="item,index in requirements" :key="index">
                        <div class="__requirements_item">
                            <div class="__requirements_item_image">
                                <img :src="item.image"/>
                            </div>
                            <div class="__requirements_item_title">
                                {{ item.title }}
                            </div>
                            <div class="__requirements_item_description">
                                {{ item.comment }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row __requirements_margin_top" name="fadeLeft">
                    <div class="col-md-6" v-for="item,index in requirements_second" :key="index">
                        <div class="__requirements_item">
                            <div class="__requirements_item_image">
                                <img :src="item.image"/>
                            </div>
                            <div class="__requirements_item_title">
                                {{ item.title }}
                            </div>
                            <div class="__requirements_item_description">
                                {{ item.comment }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__block" id="form">
            <div class="container">
                <div class="form__block_list">
                    <div class="form__block_left">
                        <div>
                            <h3>Приведите своего работодателя</h3>
                            <div class="form__block_left_description">
                                <p>Большинство из вас хотели бы получать зарплату тогда, когда это удобно или необходимо.

                                    Заполните эту форму, и мы анонимно свяжемся с вашим работодателем, чтобы подключить DayPay к вашей компании.</p>
                            </div>
                        </div>

                    </div>

                    <div class="form__block_right">
                        <form v-on:submit.prevent="onSubmitForm">
                            <input type="text" placeholder="Название компании*" v-model="company.company_name">
                            <input type="text" placeholder="Адрес компании*" required v-model="company.company_address">
                            <input type="text" placeholder="Телефон" v-model="company.company_number">
                            <input type="email" placeholder="E-mail*" required v-model="company.company_email">
                            <input type="text" placeholder="Примерное количество работников"
                                   v-model="company.employees_count">
                            <input type="text" placeholder="Где вы услышали о нас?"
                                   v-model="company.where_did_you_hear">
                            <button type="submit" class="btn btn-blue">Отправить
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.25 11.7256L5.25 11.7256" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.2002 5.70124L20.2502 11.7252L14.2002 17.7502" stroke="white"
                                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
        <div class="mass_media__block">
            <div class="container">
                <div class="mass_media__title">
                    <h5>СМИ о нас</h5>
                </div>
                <div class="mass_media__list">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="mass_media__item">
                                    <div>
                                        <div class="__title">
                                            Будущее финансовых технологий: казахстанцы запустили инновационный сервис
                                        </div>
                                        <div class="__description">
                                            Новый сервис позволит облегчить долговую нагрузку работникам, а компаниям –
                                            экономить зарплатный бюджет ...
                                        </div>
                                        <div class="__footer">
                                            <a href="https://m.forbes.kz/process/technologies/kak_poluchat_zarplatu_v_lyuboy_den_mesyatsa"
                                               class="__left">
                                                Подробнее
                                            </a>
                                            <div class="__right">
                                                <img src="/images/icons/forbes.png" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="mass_media__item">
                                    <div>
                                        <div class="__title">
                                            Future Capital Technologies creates first Kazakh payroll service
                                        </div>

                                        <div class="__description">
                                            NUR-SULTAN – Future Capital Technologies has launched DayPay, a service that
                                            allows employees to receive their salary any day of the month. The new
                                            programme will help...
                                        </div>
                                        <div class="__footer">
                                            <a href="https://kapital.kz/tehnology/82993/kak-revolyutsionnyy-servis-pozvolit-kazakhstantsam-ne-vlezat-v-dolgi.html"
                                               class="__left">
                                                Подробнее
                                            </a>
                                            <div class="__right">
                                                <img src="/images/icons/capital.png" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="mass_media__item">
                                    <div>
                                        <div class="__title">
                                            В аналог казахстанского стартапа инвестируют Билл Гейтс и Марк Цукерберг
                                        </div>

                                        <div class="__description">
                                            Во всем мире с развитием высоких технологий предлагаются новые форматы
                                            использования
                                            традиционных услуг...
                                        </div>
                                        <div class="__footer">
                                            <a href="https://tengrinews.kz/progress/analog-kazahstanskogo-startapa-investiruyut-bill-geyts-mark-387202/"
                                               class="__left">
                                                Подробнее
                                            </a>
                                            <div class="__right">
                                                <img src="/images/icons/tn-logo.png" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</template>

<script>
import Modal from '../components/modal-select.vue'
import cardsmi from '../components/card/card-smi.vue'
import Swiper from 'swiper'
import axios from 'axios';
import $ from "jquery";
import 'swiper/swiper.scss'
import Parallax from 'parallax-js'

export default {
    data() {
        return {
            frame: true,
            requirements: {
                1: {
                    'image': '/images/requirement_1.png',
                    'title': 'Возможность управления графиком получения зарплаты',
                    'comment': 'Теперь не нужно ждать определённого дня получения зарплаты, с нашим сервисом вы сами\n' +
                        '                                    выбираете этот день!'
                },

                2: {
                    'image': '/images/requirement_2.png',
                    'title': 'Правильное распределение бюджета',
                    'comment': 'Наш сервис позволяет распределить вашу зарплату равномерно на весь месяц, учитывая все затраты!'
                },
                3: {
                    'image': '/images/requirement_3.png',
                    'title': 'Денежная подушка безопасности',
                    'comment': 'В случае острой необходимости в деньгах вы всегда уверенны что сможете получить заработанные деньги через наш сервис.'
                }
            },
            requirements_second: {
                1: {
                    'image': '/images/requirement_4.png',
                    'title': 'Привлекательные условия',
                    'comment': 'Вам выгоднее получить заработную плату, чем обращаться в банки и МФО.'
                },
                2: {
                    'image': '/images/requirement_5.png',
                    'title': 'Никаких долгов',
                    'comment': 'Нет пени, штрафов и переплаты, вы получаете свои деньги, никаких платежей по итогу месяца.'
                },

            },
            company: {
                company_name: '',
                company_address: '',
                company_number: '',
                company_email: '',
                employees_count: '',
                where_did_you_hear: '',
            }

        }
    },
    methods: {
        onSubmitForm(event) {
            event.preventDefault();
            let app = this;
            axios.post('/api/bring/store', app.company).then(function (response) {
                app.company.company_name = '';
                app.company.company_address = '';
                app.company.company_number = '';
                app.company.company_email = '';
                app.company.employees_count = '';
                app.company.where_did_you_hear = '';
                app.$notification.success({
                    message: 'Форма',
                    description: response.data.message,
                })
            }).catch(function (error) {
                if (error.response.status == 422) {
                    console.log(error.response.data.errors);
                    app.$notification.success({
                        message: 'Форма',
                        description: error.response.data.errors,
                    })
                }
            })
        },
    },
    components: {
        Modal,
         cardsmi
    },
    mounted() {
        $('.video-btn').click(() => {
            this.frame = false;
            let $videoSrc = 'https://www.youtube.com/embed/UwvWeX9JQzA';
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        });

        $(".main__block_left_btn, .light__blue__btn").click(function (e) {
            e.preventDefault();
            var aid = $(this).attr("href");
            $('html,body').animate({scrollTop: $(aid).offset().top}, 'slow');
        });
        let scene = document.getElementById('imgParallax');
        let scene1 = document.getElementById('imgParallax1');
        let scene2 = document.getElementById('imgParallax2');
        let scene3 = document.getElementById('imgParallax3');
        new Parallax(scene);
        new Parallax(scene1);
        new Parallax(scene2);
        new Parallax(scene3);
        new Swiper('.swiper-container', {
            // Optional parameters
            loop: true,
            slidesPerView: 3,
            spaceBetween: 30,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                600: {
                    slidesPerView: 1,
                },
                300: {
                    slidesPerView: 1,
                },
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    },
}
</script>

