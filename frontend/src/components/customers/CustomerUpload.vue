<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-success fw-bold">Upload file Customer</h3>
                <p class="fw-italic">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti explicabo placeat eaque unde, obcaecati quasi ea ratione pariatur suscipit beatae cum est error, culpa exercitationem eligendi vero assumenda? Officiis, labore.</p>                
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div v-if="currentFile" class="progress">
                    <div
                        class="progress-bar progress-bar-info progress-bar-striped"
                        role="progressbar"
                        :aria-valuenow="progress"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        :style="{ width: progress + '%' }">
                        {{ progress }}%
                    </div>
                </div>

                <label class="btn btn-default">
                    <input type="file" ref="file" @change="selectFile" />
                </label>

                <button class="btn btn-success my-3" :disabled="!selectedFiles" @click="upload">Upload</button>
                
                <div class="alert alert-light" role="alert">{{ message }}</div>                
            </div>            
        </div>
    </div>
</template>

<script>
import CustomerDataService from '@/services/CustomerDataService';

export default {
    name: 'CustomerUpload',
    data() {
        return {
            selectedFiles: undefined,
            currentFile: undefined,
            progress: 0,
            message: "",
            fileInfos: []
        };
    },
    methods: {
        selectFile() {
            this.selectedFiles = this.$refs.file.files;
        },
        upload() {
        this.progress = 0;
        this.currentFile = this.selectedFiles.item(0);        
        CustomerDataService.uploadFile(this.currentFile, event => {
            this.progress = Math.round((100 * event.loaded) / event.total);
            })
            .then(response => {
                this.message = 'Register inserting ' + response.data.lengh;            
            })
            .then(files => {
                this.fileInfos = files.data;
            })
            .catch(() => {
                this.progress = 0;
                this.message = "Could not upload the file!";
                this.currentFile = undefined;
            });

        this.selectedFiles = undefined;
        }
    }    
}
</script>