
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('axios');

window.Vue = require('vue');

// Instantiate event bus
const EventBus = new Vue()

Object.defineProperties(Vue.prototype, {
    $bus: {
        get: function () {
            return EventBus
        }
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/BookComponent.vue -> <example-component></example-component>
 */

bookComponent = Vue.component('book-component', require('./components/BookComponent.vue'));
bookManager = Vue.component('book-manager', require('./components/BookManager.vue'));

const files = require.context('./', true, /\.vue$/i)

files.keys().map(key => {
    return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
});

/**
 * App js
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data: {
        component: null,
        componentsArray: ['foo', 'bar'],
    },
    mounted()
    {
        //
    },
    components: {
        'foo': {
            template: '<h1>Foo component</h1>'
        },
        'bar': {
            template: '<h1>Bar component</h1>'
        },
        bookManager
    },
    methods: {

        addBook: function()
        {
            var that = this;
            var newBook = {
                userId: document.getElementById('userId').value,
                title: document.getElementById('title').value,
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                publicationDate: document.getElementById('publicationDate').value,
            };

            axios.post('/book/create', newBook)
                .then(function (response) {
                    console.log(response);
                    console.log(response.data);
                    that.$bus.$emit('add-book', response.data);
                    that.resetForm();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        // Empty the form, used after creation of a new book
        resetForm: function()
        {
            document.getElementById('title').value = '';
            document.getElementById('firstName').value = '';
            document.getElementById('lastName').value = '';
            document.getElementById('publicationDate').value = ''
        }

        // swap: function(component)
        // {
        //     this.component = component;
        // }
    }
});

