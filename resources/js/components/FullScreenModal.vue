<template>
    <!-- Modal -->
        <div class="modal-dialog momodel modal-fluid" role="document">
            <div class="modal-content ">
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <embed class="pdf" :src="`uploads/${fullScreenModalDocument.file}`" :alt="documentInModal"/>
                </div>
            </div>
        </div>
    <!-- Modal -->
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
