<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>

                    <div>
                        <div class="spinner-border">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <li v-for="subject in subjects">
                        <strong>[{{subject.shortcut}}]</strong> {{subject.title}}
                    </li>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.loaded = true;

            axios.get('/api/subjects').then(subjects => {
                this.subjects = subjects.data;
                this.loaded = true;
            });
        },
        data() {
            return {
                loaded: false,
                subjects: []
            }
        }
    }
</script>
