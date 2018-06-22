<template>
    <div>
        <div v-for="document in documents">
            <div class="col-md-4">
                <a :href="'/documents/{{ document.id }}'">
                    <img src="#" alt="Card image cap">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </div>
                                <small class="text-muted">{{ document.updated_at }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'">
        </paginate>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                documents: [],
                pageCount: 1,
                endpoint: 'api/documents?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                    this.documents = data.data;
                    this.pageCount = data.meta.last_page;
                });
            }
        }
    }
</script>