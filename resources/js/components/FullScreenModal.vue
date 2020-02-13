<template>
        <div class="modal-dialog momodel modal-fluid" role="document">
            <div class="modal-content ">
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <embed class="pdf" :src="fullScreenModalDocument.location" :alt="fullScreenModalDocument.file"/>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: 'FullScreenModal',
        props: {
            fullScreenModalDocument: {}
        },
        mounted() {
            console.log('Component mounted (components/FullScreenModal.vue).')
        },
        data() {
            return {}
        }
    }
</script>

<style scoped>

    .modal-dialog {
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: none !important;

    }

    .modal-content {
        height: auto !important;
        min-height: 100% !important;
        border-radius: 0 !important;
        background-color: #ececec !important
    }

    .pdf {
        position: relative;
        background: #e9e9ea;
        padding: 5px;
        width: 100%;
        height: 600px;
        margin: 10px;
        z-index: 1;
    }

    .close {
        position: absolute;
        left: 97%;
        top: 0px;
        z-index: 2;
    }
</style>
