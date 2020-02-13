<template>
    <div class="content">
        <alert v-show="alert.active"
               :alert="alert"
        />
        <div class="large-12 medium-12 small-12 cell form-group">
            <label>
                <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </label>
            <div v-if="uploading">
                <img src="/assets/loader.gif" width="30" alt="Loader">
            </div>
            <br>
            <button class="btn btn-primary" v-on:click="submitFile()">Upload document</button>
        </div>
    </div>
</template>

<script>
    import Alert from './Alert.vue';

    export default {
        name: "UploadsModal",
        components: {
            Alert
        },
        props: {},
        mounted() {
            console.log('Component mounted (components/UploadsModal.vue).')
        },
        data() {
            return {
                file: '',
                alert: {
                    active: false,
                    success: '',
                    message: ''
                },
                uploading: false
            }
        },
        methods: {
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
                this.alert.active = false;
                console.log(this.file);
            },
            submitFile() {
                if (!this.isValid(this.file)) {
                    this.alert.active = true;
                    this.alert.success = false;
                    return;
                }
                let _this = this;
                let formData = new FormData();
                _this.uploading = true;
                formData.append('file', this.file);
                axios.post('api/v1/documents', formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        onUploadProgress: progressEvent => {
                            _this.uploadPercentage = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
                        }
                    }
                ).then(function (response) {
                    _this.alert.success = response.data.success;
                    _this.alert.message = response.data.message;
                    _this.alert.active = true;
                    _this.uploading = false;
                }).catch(function (error) {
                    _this.alert.active = true;
                    _this.alert.success = false;
                    _this.alert.message = "File can not be uploaded";
                    _this.uploading = false;
                });
                this.file = 'added';
            },
            isValid(file) {
                if (!file) {
                    console.log('no file');
                    this.alert.message = 'No file chosen';
                    return false;
                }
                if (file === 'added') {
                    this.alert.message = 'Reselect file';
                    return false;
                }
                if (file.type !== 'application/pdf') {
                    this.alert.message = 'Select PDF file!';
                    return false;
                }
                if (file.size > 1024 * 1024) {
                    this.alert.message = 'File too big';
                    return false;
                }
                return true;
            }
        }
    }
</script>

