<template>
    <div>
        <div class="container">
            <div class="cabinet__block">
                <div class="cabinet__right">
                    <div class="cabinet__card">
                        <div class="cabinet__navbar">
                            <div class="cabinet__navbar_item -active">Payout history</div>
                            <div class="cabinet__navbar_item">Documents</div>
                        </div>
                        <div class="cabinet__history_list">
                            <div class="cabinet__history_date">
                                Сегодня <span>- 15 000,00 $</span>
                            </div>
                            <div class="cabinet__history_item">
                                <div class="cabinet__history_item_left">
                                    <img src="/images/icons/ic-transuction.png">
                                    <span>∙∙ 2290</span>
                                </div>
                                <div class="cabinet__history_item_right">
                                    <p>- 15 000,00 ₸</p>
                                    <span>14:58</span>
                                </div>
                            </div>

                            <div class="cabinet__history_date">
                                15.10.2021 <span>- 45 000,00 ₸</span>
                            </div>
                            <div class="cabinet__history_item" v-for="n in 10">
                                <div class="cabinet__history_item_left">
                                    <img src="/images/icons/ic-transuction.png">
                                    <span>∙∙ 2290</span>
                                </div>
                                <div class="cabinet__history_item_right">
                                    <p>- 15 000,00 ₸</p>
                                    <span>14:58</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <cabinet-footer></cabinet-footer>
    </div>
</template>

<script>
import cabinetfooter from '~/components/cabinet-footer.vue'

export default {
    data() {
        return {}
    },

    components: {
        'cabinet-footer': cabinetfooter
    },
    mounted() {

    },
}
</script>
<style>

</style>
