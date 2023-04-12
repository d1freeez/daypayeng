<template>
    <div>
        <div class="question__block_circle_left"></div>
        <div class="question__header">
            <div class="question__header_title">
                <div class="container">
                    <h1>Часто задаваемые вопросы</h1>
                </div>
                <div class="__path">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li class="__pather">
                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.25L5.5 5.75L1.5 9.75" stroke="white"/>
                            </svg>
                        </li>
                        <li><span>Часто задаваемые вопросы</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="question__description">
                    <h3>Есть вопрос?</h3>
                    <p>Вот наши часто задаваемые вопросы, чтобы помочь вам в дальнейшем, однако, если мы пропустили то,
                        что
                        вы хотите знать, свяжитесь с нами ниже или свяжитесь с нами здесь.</p>
                </div>
                <div class="question__list_header ">
                    <div class="question__list_header_item " v-on:click="question_type='employee'"
                         :class="question_type=='employee'?'-active':''">
                        Для работников
                    </div>
                    <div class="question__list_header_item" v-on:click="question_type='buisness'"
                         :class="question_type=='buisness'?'-active':''">
                        Для работадателей
                    </div>
                </div>
                <div class="question__list_block" :class="question_type=='employee'?'-active':''">
                    <div class="question__list">
                        <div class="question__item" v-for="item,index in question_list_buisness">
                            <div class="question__item_head" @click="item.show = !item.show">
                                <div class="question__item_head_left">
                                    {{ item.title }}
                                </div>
                                <div class="question__item_head_right">
                                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" v-if="item.show==true"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 6L6 1L1 6" stroke="white"/>
                                    </svg>
                                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" v-if="item.show==false"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="white"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="question__item_description" :class="item.show==true?'-active':''">
                                <div v-html="item.answer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question__list_block" :class="question_type=='buisness'?'-active':''">
                    <div class="question__list">
                        <div class="question__item" v-for="item,index in question_list">
                            <div class="question__item_head" @click="item.show = !item.show">
                                <div class="question__item_head_left">
                                    {{ item.title }}
                                </div>
                                <div class="question__item_head_right">
                                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" v-if="item.show==true"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 6L6 1L1 6" stroke="white"/>
                                    </svg>
                                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" v-if="item.show==false"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="white"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="question__item_description" :class="item.show==true?'-active':''">
                                <div v-html="item.answer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "index",
    data() {
        return {
            question_type: 'employee',
            question_list_buisness: [],
            question_list: []
        }
    },
    mounted() {
        axios.get('/api/faq/')
            .then(data => {
                let now_data = data.data;
                for (let i = 0; i < now_data.length; i++) {
                    let item = {
                        'title': now_data[i].question,
                        'show': false,
                        'answer': now_data[i].answer,
                    }
                    this.question_list_buisness.push(item)
                }
            })
            .catch(err => {
                console.error(err.message);
            });
        axios.get('/api/faq/?is_employee=1')
            .then(data => {
                let now_data = data.data;
                for (let i = 0; i < now_data.length; i++) {
                    let item = {
                        'title': now_data[i].question,
                        'show': false,
                        'answer': now_data[i].answer,
                    }
                    this.question_list.push(item)
                }
            })
            .catch(err => {
                console.error(err.message);
            });
    }
}
</script>

<style scoped>

</style>
