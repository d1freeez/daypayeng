<template>
    <div>
        <div class="cabinet__menu">
            <div class="cabinet__menu_list">
                <div class="cabinet__menu_item">
                    <a href="/dashboard/employee" :class="footer_url=='/dashboard/employee'?'nuxt-link-exact-active':''">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-passive">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M16.2777 12.8894C16.9524 12.8894 17.5188 13.4462 17.4156 14.1125C16.8103 18.0325 13.4545 20.9431 9.40717 20.9431C4.92928 20.9431 1.2998 17.3136 1.2998 12.8368C1.2998 9.14834 4.10191 5.71255 7.25665 4.9357C7.93454 4.76834 8.62928 5.24518 8.62928 5.94307C8.62928 10.6715 8.78823 11.8947 9.68612 12.5599C10.584 13.2252 11.6398 12.8894 16.2777 12.8894Z"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M20.6921 8.9517C20.7458 5.9138 17.0142 1.01696 12.4669 1.10117C12.1132 1.10749 11.83 1.40222 11.8142 1.75485C11.6995 4.25275 11.8542 7.48959 11.9406 8.95696C11.9669 9.4138 12.3258 9.77275 12.7816 9.79906C14.29 9.88538 17.6448 10.0033 20.1069 9.63064C20.4416 9.58012 20.6869 9.28959 20.6921 8.9517Z"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-active">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.3264 0.209663C10.4861 0.0663223 10.6973 -0.00881318 10.9135 0.000824899C15.4843 0.137655 19.3044 3.4558 19.9967 7.89063C20.0011 7.91711 20.0011 7.94411 19.9967 7.97059C20.0116 8.18043 19.9407 8.38745 19.7996 8.54585C19.6586 8.70425 19.459 8.80099 19.2451 8.81466L11.5656 9.3211C11.3116 9.34362 11.0597 9.26005 10.8718 9.09092C10.6839 8.92179 10.5774 8.68278 10.5785 8.43261L10.0623 0.889316V0.764928C10.0717 0.552776 10.1667 0.353003 10.3264 0.209663ZM9.79965 11.2936L16.4297 10.8848H16.5011C16.7869 10.8895 17.0591 11.0054 17.2579 11.207C17.4566 11.4087 17.5655 11.6795 17.5606 11.9599C17.2984 15.782 14.4962 18.9755 10.6828 19.7982C6.86938 20.621 2.96017 18.8754 1.08778 15.5139C0.537217 14.5457 0.189303 13.4794 0.064454 12.3775C0.0160313 12.051 -0.0051696 11.7212 0.00106199 11.3913C0.0136824 7.32706 2.90728 3.81907 6.95607 2.9595C7.4462 2.86776 7.93762 3.11248 8.15146 3.55479C8.25711 3.71408 8.28448 3.9091 8.29693 4.09983C8.36702 5.17389 8.43928 6.23903 8.51126 7.30004C8.57317 8.2127 8.63488 9.1223 8.69482 10.0319C8.69173 10.2462 8.7254 10.4594 8.79444 10.6627C8.95695 11.0627 9.36136 11.3165 9.79965 11.2936Z"
                                  fill="white"/>
                        </svg>


                        <span>Дашборд</span>
                    </a>

                </div>
                <div class="cabinet__menu_item">
                    <a href="/dashboard/employee?dashboard=true"
                       :class="footer_url=='/dashboard/employee?dashboard=true'?'nuxt-link-exact-active':''">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-passive">
                            <path
                                d="M20.6389 12.3957H16.5906C15.1042 12.3948 13.8993 11.1909 13.8984 9.70446C13.8984 8.21801 15.1042 7.01409 16.5906 7.01318H20.6389"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.0485 9.64294H16.7369" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6.74766 1H15.3911C18.2892 1 20.6388 3.34951 20.6388 6.24766V13.4247C20.6388 16.3229 18.2892 18.6724 15.3911 18.6724H6.74766C3.84951 18.6724 1.5 16.3229 1.5 13.4247V6.24766C1.5 3.34951 3.84951 1 6.74766 1Z"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.03564 5.5382H11.4346" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-active">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M15.7689 5.3818H20C20 1.98459 17.9644 0 14.5156 0H5.48444C2.03556 0 0 1.98459 0 5.33847V12.6615C0 16.0154 2.03556 18 5.48444 18H14.5156C17.9644 18 20 16.0154 20 12.6615V12.3495H15.7689C13.8052 12.3495 12.2133 10.7975 12.2133 8.883C12.2133 6.96849 13.8052 5.41647 15.7689 5.41647V5.3818ZM15.7689 6.87241H19.2533C19.6657 6.87241 20 7.19834 20 7.60039V10.131C19.9952 10.5311 19.6637 10.8543 19.2533 10.8589H15.8489C14.8548 10.872 13.9855 10.2084 13.76 9.26432C13.6471 8.67829 13.8056 8.07357 14.1931 7.61222C14.5805 7.15087 15.1573 6.88007 15.7689 6.87241ZM15.92 9.53298H16.2489C16.6711 9.53298 17.0133 9.1993 17.0133 8.78767C17.0133 8.37605 16.6711 8.04237 16.2489 8.04237H15.92C15.7181 8.04005 15.5236 8.11664 15.38 8.25504C15.2364 8.39344 15.1555 8.58213 15.1556 8.77901C15.1555 9.19205 15.4964 9.52823 15.92 9.53298ZM4.73778 5.3818H10.3822C10.8044 5.3818 11.1467 5.04812 11.1467 4.63649C11.1467 4.22487 10.8044 3.89119 10.3822 3.89119H4.73778C4.31903 3.89116 3.9782 4.2196 3.97333 4.62783C3.97331 5.04087 4.31415 5.37705 4.73778 5.3818Z"
                                  fill="white"/>
                        </svg>
                        <span>Payout history</span>
                    </a>

                </div>
                <div class="cabinet__menu_item">
                    <a href="/dashboard/employee/cards" :class="footer_url=='/dashboard/employee/cards'?'nuxt-link-exact-active':''">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-active"
                        >
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.92574 14.39H11.3119C11.7178 14.39 12.0545 14.05 12.0545 13.64C12.0545 13.23 11.7178 12.9 11.3119 12.9H5.92574C5.5198 12.9 5.18317 13.23 5.18317 13.64C5.18317 14.05 5.5198 14.39 5.92574 14.39ZM9.27228 7.9H5.92574C5.5198 7.9 5.18317 8.24 5.18317 8.65C5.18317 9.06 5.5198 9.39 5.92574 9.39H9.27228C9.67822 9.39 10.0149 9.06 10.0149 8.65C10.0149 8.24 9.67822 7.9 9.27228 7.9ZM16.3381 7.02561C16.5708 7.02292 16.8242 7.02 17.0545 7.02C17.302 7.02 17.5 7.22 17.5 7.47V15.51C17.5 17.99 15.5099 20 13.0545 20H5.17327C2.59901 20 0.5 17.89 0.5 15.29V4.51C0.5 2.03 2.5 0 4.96535 0H10.2525C10.5099 0 10.7079 0.21 10.7079 0.46V3.68C10.7079 5.51 12.203 7.01 14.0149 7.02C14.4381 7.02 14.8112 7.02316 15.1377 7.02593C15.3917 7.02809 15.6175 7.03 15.8168 7.03C15.9578 7.03 16.1405 7.02789 16.3381 7.02561ZM16.6111 5.566C15.7972 5.569 14.8378 5.566 14.1477 5.559C13.0527 5.559 12.1507 4.648 12.1507 3.542V0.906C12.1507 0.475 12.6685 0.261 12.9646 0.572C13.5004 1.13476 14.2368 1.90834 14.9699 2.67837C15.7009 3.44632 16.4286 4.21074 16.9507 4.759C17.2398 5.062 17.0279 5.565 16.6111 5.566Z"
                                  fill="white"/>
                        </svg>
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-passive">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M11.7379 0.761748H5.08493C3.00493 0.753748 1.29993 2.41175 1.25093 4.49075V15.2037C1.20493 17.3167 2.87993 19.0677 4.99293 19.1147C5.02393 19.1147 5.05393 19.1157 5.08493 19.1147H13.0739C15.1679 19.0297 16.8179 17.2997 16.8029 15.2037V6.03775L11.7379 0.761748Z"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.4751 0.75V3.659C11.4751 5.079 12.6231 6.23 14.0431 6.234H16.7981"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.2882 13.3584H5.88818" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M9.24321 9.60596H5.88721" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                        <span>Cards</span>
                    </a>

                </div>
                <div class="cabinet__menu_item">
                    <a href="/employee/profile" :class="footer_url=='/employee/profile'?'nuxt-link-exact-active':''" >
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-active">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M18.4023 11.58C18.76 11.77 19.036 12.07 19.2301 12.37C19.6083 12.99 19.5776 13.75 19.2097 14.42L18.4943 15.62C18.1162 16.26 17.411 16.66 16.6855 16.66C16.3278 16.66 15.9292 16.56 15.6022 16.36C15.3365 16.19 15.0299 16.13 14.7029 16.13C13.6911 16.13 12.8429 16.96 12.8122 17.95C12.8122 19.1 11.872 20 10.6968 20H9.30692C8.12145 20 7.18125 19.1 7.18125 17.95C7.16081 16.96 6.31259 16.13 5.30085 16.13C4.96361 16.13 4.65702 16.19 4.40153 16.36C4.0745 16.56 3.66572 16.66 3.31825 16.66C2.58245 16.66 1.87729 16.26 1.49917 15.62L0.79402 14.42C0.415896 13.77 0.395456 12.99 0.773581 12.37C0.937094 12.07 1.24368 11.77 1.59115 11.58C1.87729 11.44 2.06125 11.21 2.23498 10.94C2.74596 10.08 2.43937 8.95 1.57071 8.44C0.55897 7.87 0.231943 6.6 0.814459 5.61L1.49917 4.43C2.09191 3.44 3.35913 3.09 4.38109 3.67C5.27019 4.15 6.425 3.83 6.9462 2.98C7.10972 2.7 7.20169 2.4 7.18125 2.1C7.16081 1.71 7.27323 1.34 7.4674 1.04C7.84553 0.42 8.53024 0.02 9.27627 0H10.7172C11.4735 0 12.1582 0.42 12.5363 1.04C12.7203 1.34 12.8429 1.71 12.8122 2.1C12.7918 2.4 12.8838 2.7 13.0473 2.98C13.5685 3.83 14.7233 4.15 15.6226 3.67C16.6344 3.09 17.9118 3.44 18.4943 4.43L19.179 5.61C19.7718 6.6 19.4447 7.87 18.4228 8.44C17.5541 8.95 17.2475 10.08 17.7687 10.94C17.9322 11.21 18.1162 11.44 18.4023 11.58ZM7.10972 10.01C7.10972 11.58 8.4076 12.83 10.0121 12.83C11.6165 12.83 12.8838 11.58 12.8838 10.01C12.8838 8.44 11.6165 7.18 10.0121 7.18C8.4076 7.18 7.10972 8.44 7.10972 10.01Z"
                                  fill="white"/>
                        </svg>
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="-passive">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M18.8064 6.62361L18.184 5.54352C17.6574 4.6296 16.4905 4.31432 15.5753 4.83872V4.83872C15.1397 5.09534 14.6198 5.16815 14.1305 5.04109C13.6411 4.91402 13.2224 4.59752 12.9666 4.16137C12.8021 3.88415 12.7137 3.56839 12.7103 3.24604V3.24604C12.7251 2.72922 12.5302 2.2284 12.1698 1.85767C11.8094 1.48694 11.3143 1.27786 10.7973 1.27808H9.54326C9.03672 1.27807 8.55107 1.47991 8.19376 1.83895C7.83644 2.19798 7.63693 2.68459 7.63937 3.19112V3.19112C7.62435 4.23693 6.77224 5.07681 5.72632 5.0767C5.40397 5.07336 5.08821 4.98494 4.81099 4.82041V4.82041C3.89582 4.29601 2.72887 4.61129 2.20229 5.52522L1.5341 6.62361C1.00817 7.53639 1.31916 8.70261 2.22975 9.23231V9.23231C2.82166 9.57404 3.18629 10.2056 3.18629 10.8891C3.18629 11.5725 2.82166 12.2041 2.22975 12.5458V12.5458C1.32031 13.0719 1.00898 14.2353 1.5341 15.1454V15.1454L2.16568 16.2346C2.4124 16.6798 2.82636 17.0083 3.31595 17.1474C3.80554 17.2866 4.3304 17.2249 4.77438 16.976V16.976C5.21084 16.7213 5.73094 16.6516 6.2191 16.7822C6.70725 16.9128 7.12299 17.233 7.37392 17.6717C7.53845 17.9489 7.62686 18.2646 7.63021 18.587V18.587C7.63021 19.6435 8.48671 20.5 9.54326 20.5H10.7973C11.8502 20.5001 12.7053 19.6491 12.7103 18.5962V18.5962C12.7079 18.088 12.9086 17.6 13.2679 17.2407C13.6272 16.8814 14.1152 16.6807 14.6233 16.6831C14.9449 16.6917 15.2594 16.7798 15.5387 16.9394V16.9394C16.4515 17.4653 17.6177 17.1544 18.1474 16.2438V16.2438L18.8064 15.1454C19.0615 14.7075 19.1315 14.186 19.001 13.6964C18.8704 13.2067 18.55 12.7894 18.1108 12.5367V12.5367C17.6715 12.284 17.3511 11.8666 17.2206 11.3769C17.09 10.8873 17.16 10.3658 17.4151 9.92796C17.581 9.63834 17.8211 9.3982 18.1108 9.23231V9.23231C19.0159 8.70289 19.3262 7.54349 18.8064 6.63277V6.63277V6.62361Z"
                                  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="10.1747" cy="10.8891" r="2.63616" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Settings</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "cabinet-footer",
    props: ['footer_url'],
    data() {
        return {
            menu: false
        }
    },
}
</script>

<style scoped>

</style>
