<template>
    <div>
        <div class="container">
            <div class="cabinet__block">
                <div class="cabinet__left">
                    <div class="cabinet__card">
                        <div class="cabinet__card_header">Available amount</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_price">
                                215 000 $
                            </div>
                            <div class="cabinet__card_bar">
                                <div class="cabinet__card_bar_percent">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="cabinet__card mt-4">
                        <div class="cabinet__card_header">Withdraw money</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_input">
                                <input placeholder="Enter the amount* ">
                            </div>
                            <div>
                                <button class="cabinet__card_btn">Получить <img src="/images/icons/ic-arrow-right.png">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cabinet__card mt-4">
                        <div class="cabinet__card_header">Withdraw money</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_card_list">
                                <div class="cabinet__card_card_item">
                                    <div class="cabinet__card_card_item_left"><img
                                        src="/images/icons/ic-plastic-mc.png"></div>
                                    <div class="cabinet__card_card_item_right">∙∙ 2290</div>
                                </div>
                                <div class="cabinet__card_card_item">
                                    <div class="cabinet__card_card_item_left"><img
                                        src="/images/icons/ic-plastic-mc.png"></div>
                                    <div class="cabinet__card_card_item_right">∙∙ 2290</div>
                                </div>
                                <div class="cabinet__card_card_item">
                                    <div class="cabinet__card_card_item_left"><img
                                        src="/images/icons/ic-empty-card.png"></div>
                                    <div class="cabinet__card_card_item_right">Add card</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cabinet__card mt-4">
                        <div class="cabinet__card_header">Withdraws</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_description">
                                Total amount of payouts
                            </div>
                            <div class="cabinet__card_subprice">
                                13
                            </div>
                        </div>
                    </div>
                    <div class="cabinet__card mt-4">
                        <div class="cabinet__card_header">Active payouts</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_description">
                                Amount of payouts in this month
                            </div>
                            <div class="cabinet__card_subprice">
                                0
                            </div>
                        </div>
                    </div>
                    <div class="cabinet__card mt-4">
                        <div class="cabinet__card_header">Plan "Super"</div>
                        <div class="cabinet__card_content">
                            <div class="cabinet__card_description">
                                The next withdraw will be
                            </div>
                            <div class="cabinet__card_subprice">
                                2021-10-25
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cabinet__right -desktop">
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
фыв
        <cabinet-footer></cabinet-footer>

    </div>
</template>

<script>
import cabinetfooter from '../../components/cabinet-footer.vue'

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
