<template>
    <div class="col-md-4 order-md-2 mb-4" style="max-height: 300px; overflow-y: auto">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">books</span>
            <button @click="alphabetize" type="button" class="btn btn-sm btn-warning">alphabetize</button>
            <span class="badge badge-secondary badge-pill">{{ bookCount }}</span>
        </h4>
        <ul class="list-group mb-3">
            <draggable @start="drag=true" @end="drag=false">
                <li v-for="book in books" class="list-group-item d-flex justify-content-between lh-condensed list-group-item-action">
                    <div>
                        <div id="user_id" style="display:none">{{ book.user_id }}</div>
                        <h6 class="my-0">{{ book.title }}</h6>
                        <small class="text-muted">{{ book.author_first_name }}</small>
                        <small class="text-muted">{{ book.author_last_name }}</small>
                    </div>
                    <span class="text-muted">{{ book.publication_date }}</span>
                    <button @click="destroyBook" type="button" class="btn-sm btn-danger" v-bind:value="book.id">delete</button>
                </li>
            </draggable>
        </ul>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable,
        },
        data: function() {
            return {
                books: [],
            }
        },
        created() {
            var that = this;
            // When a new book is added, add to book manager data
            this.$bus.$on('add-book', ($event) => {
               that.books.push($event);
            });
        },
        mounted() {
            this.getBooks();
        },
        computed: {
            bookCount: function() {
                return this.books.length;
            }
        },
        methods: {
            alphabetize: function () {
               return this.books.sort(function(a, b){
                   if(a.author_last_name.toLowerCase > b.author_last_name.toLowerCase) { return 1; }
                   if(a.author_last_name.toLowerCase < b.author_last_name.toLowerCase) { return -1; }
                   return 0;
               }).reverse()
            },
            updateBooks: function(book) {
               console.log(book);
            },
            // Retrieve all books from API
            getBooks: function() {
                var that = this;
                axios.get('/books')
                    .then(function (response) {
                        that.books = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            // Get a single book from API
            getBook: function() {

            },
            // Delete a book from API
            destroyBook: function(event) {
                var that = this;
                axios.post('/book/destroy', {
                    //This is the book id tied to the delete button
                    id: event.srcElement.value,
                })
                    .then(function (response) {
                        console.log(response);
                        that.getBooks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        }
    };
</script>
