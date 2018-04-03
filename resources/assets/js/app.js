
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el:'#app',
    mounted:function(){
        this.getProductos();
    },
    data:{
        list:[],
        pagination:{}
    },
    methods:{
        getProductos:function(url){
            url =url || 'http://localhost/proyecto/public/producto';
            axios.get(url).then(response=>{
                this.list=response.data;
                this.setPaginator(response.data);
            });
        },
        setPaginator:function(data){
            let pagination = {
                current_page: data.current_page,
                path: data.path,
                last_page: data.last_page,
                first_page_url: data.first_page_url,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
                last_page_url: data.last_page_url
            }
            this.pagination=pagination;
        }
    }
});
