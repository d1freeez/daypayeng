<template>
    <div>
        <user-header :user="user"></user-header>
        <main>
            <vue-page-transition :name="direction">
                <router-view></router-view>
            </vue-page-transition>
        </main>
        <user-footer></user-footer>
    </div>
</template>
<script>
import Header from '../components/menu';
import Footer from '../components/footer';

export default {
    props: ['user'],
    data() {
        return {direction: 'fade-in-right'};
    },
    created() {

    },
    methods: {},
    components: {
        'user-header': Header,
        'user-footer': Footer,
    }
}
</script>
<style>

</style>
