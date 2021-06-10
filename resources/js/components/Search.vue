<template>
    <div class="searchbar">
      <input type="text" placeholder="Поиск по товарам" v-model="query">        
      <ul v-if="results.length > 0 && query">
        <a v-for="result in results.slice(0,10)" :key="result.id" :href="itemPath+'?id='+result.searchable.id">
            <li class="d-flex align-items-center w-100 px-4 py-3">
                <img class="rounded-circle mx-2" :src="imgPath+'/'+result.url" alt="">
                <p class="my-auto mx-2" v-text="result.title"></p>
                <a class="d-flex align-items-center text-decoration-none outline-none" :href="'add-item/'+result.searchable.id">
                    <span class="ml-2 badge badge-success badge-pill">
                        <i class="fas fa-cart-plus float-left mr-1"></i>
                        <span v-text="result.searchable.price+' ₽'"></span>
                    </span>
                </a>
            </li>
        </a>
      </ul>
    </div>
</template>

<script>
export default {

    props: ['imgPath', 'itemPath'],

    data() {
        return {
            query: null,
            results: []
        };
    },
    watch: {
        query(after, before) {
            this.searchItems();
        }
    },
    methods: {
        searchItems() {
            if (this.query.trim() != '')
            {
                axios.get('/search', { params: { query: this.query.trim() } })
                .then(response => this.results = response.data)
                .catch(error => {});
            }
        }
    }
}
</script>