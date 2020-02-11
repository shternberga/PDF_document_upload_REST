<template>
    <div class="container">
        <div class="row">
            <div class="container add-document-container">
                <div class="col-md-8 offset-md-2">
                    <hr/>
                    <div
                        class="button_cont"
                        align="center"
                        @click="modalUploadShow = !modalUploadShow">
                        <a class="a-modal">add new document</a>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4 col-lg-3"
                 style="margin-bottom: 20px"
                 v-for="pdf in laravelData.data" :key="pdf.id"
            >
                <div class="card">
                    <a @click="
                    modalPdfShow = !modalPdfShow;
                    fileInModal = pdf.file;
                ">
                        <img class="card-img-top"
                             :src="`uploads/thumbnails/${pdf.file}.jpg`"
                             :alt="pdf.file" width="100%" height="180px">
                    </a>
                    <div class="card-body flex justify-content-between">
                        <h6 class="card-title text-center">{{pdf.file}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <pagination :data="laravelData" @pagination-change-page="getResults" class="pagination"></pagination>

        <b-modal
            size="s"
            centered
            id="modal-2"
            v-model="modalUploadShow"
            ok-only>
            <UploadsModal/>
        </b-modal>

        <b-modal
            size="xl"
            centered
            id="modal-1"
            v-model="modalPdfShow">
            <PdfModal :fileInModal="fileInModal"/>
        </b-modal>

    </div>
</template>

<script>
    import UploadsModal from "./UploadsModal";
    import PdfModal from "./PdfModal";
    export default {
        name: "gallery",
        components: {
            UploadsModal,
            PdfModal
        },
        mounted() {
            console.log('Component mounted (components/Gallery.vue).')
        },
        data() {
            return {
                file: '',
                laravelData: {},
                modalUploadShow: false,
                modalPdfShow: false,
                fileInModal: ''
            }
        },
        created() {
            this.getResults();
        },
        watch: {
            modalUploadShow() {
                if (this.modalUploadShow === false) {
                    this.getResults();
                }
            }
        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                this.$http.get('api/v1/documents?page=' + page)
                    .then(response => {
                        return response.json();
                    }).then(data => {
                    this.laravelData = data;
                });
            }
        }
    }
</script>

<style scoped>
    .card-img-top {
        position: relative;
        z-index: 1;
    }

    .add-document-container {
        margin: 70px 0 30px 0;
    }

    .card:hover {
        border: 1px solid grey;
    }

    .button_cont {
        padding-right: 10%;
        margin: 1% 0;
    }

    .a-modal {
        color: #fff !important;
        text-transform: uppercase;
        text-decoration: none;
        background: #ed3330;
        padding: 15px;
        border-radius: 5px;
        display: inline-block;
        border: none;
        transition: all 0.4s ease 0s;
    }

    .a-modal:hover {
        background: #434343;
        transition: all 0.4s ease 0s;
    }
</style>

