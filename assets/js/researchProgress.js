Vue.use(window["vue-js-modal"].default)

var app = new Vue({
    el: '#app',
    data: {
        id: null,
        name: null,
        contributers: null,
        status: null,
        completion: null,
        researches: [],
        mode: 'save',
        model: null,
        selected_student: null
    },
    methods: {
        onSubmit() {
            const self = this;

            var bodyFormData = new FormData();
            bodyFormData.set('research-name', this.name); // $_POST['research-name']
            bodyFormData.set('research-status', this.status);
            bodyFormData.set('research-contributers', this.contributers);
            bodyFormData.set('research-completionPercentage', this.completion);
            axios({
                method: 'post',
                url: '/assets/api/research/create_research.php',
                data: bodyFormData,
                config: null
            }).then(function (response) {
                self.researches.push(response.data);
                this.name = x.name;
                this.contributers = x.contributers;
                this.status = x.status;
                this.completion = x.completion;
            }).catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        add(name, contributers, status, completion) {
            this.mode = 'save';
            console.log(name, contributers, status, completion);


            this.$modal.hide('researchForm');
        },
        update(name, contributers, status, completion) {

            const self = this;

            var bodyFormData = new FormData();
            bodyFormData.set('research-name', this.name); // $_POST['research-name']
            bodyFormData.set('research-status', this.status);
            bodyFormData.set('research-contributers', this.contributers);
            bodyFormData.set('research-completionPercentage', this.completion);
            axios({
                method: 'post',
                url: '/assets/api/research/edit_research.php?id=' + this.id,
                data: bodyFormData,
                config: null
            }).then(function (response) {
                let idx = this.researches.indexOf(x);
                this.researches.splice(idx, 1);
                self.researches.push(response.data);
                this.name = "";
                this.contributers = "";
                this.status = "";
                this.completion = "";
            }).catch(function (error) {
                // handle error
                console.log(error);
            })



        },
        edit(x, id) {
            this.id = id;
            this.mode = 'edit';
            this.model = x;
            this.name = x.name;
            this.contributers = x.contributers;
            this.status = x.status;
            this.completion = x.completion;
            this.$modal.show('researchForm');
            console.log(axios);
        },
        remove(x, id) {

            var r = confirm("Are you sure you want to remove the phase?");
            if (r == true) {
                const self = this;

                var bodyFormData = new FormData();
                bodyFormData.set('research-name', this.name); // $_POST['research-name']
                bodyFormData.set('research-status', this.status);
                bodyFormData.set('research-contributers', this.contributers);
                bodyFormData.set('research-completionPercentage', this.completion);

                axios({
                    method: 'get',
                    url: '/assets/api/research/remove_research.php?id=' + id,
                    data: bodyFormData,
                    config: null
                }).then(function (response) {
                    alert('Removed!')
                    let idx = this.researches.indexOf(x);
                    this.researches.splice(idx, 1);
                }).catch(function (error) {
                    // handle error
                    console.log(error);
                })
            }


        },
        statusColor(x) {
            if (x == 'completed') {
                return ' bg-success'
            }
            else if (x == 'pending') {
                return 'bg-warning'
            }
            else if (x == 'completed') {
                return 'bg-success'
            }
            return ' bg-danger'
        }
    },
    created() {
        const self = this;

        axios({
            method: 'post',
            url: '/assets/api/research/get_researchs.php',
            data: null,
            config: null
        }).then(function (response) {
            self.researches = response.data;
            console.log(response.data);
        }).catch(function (error) {
            // handle error
            console.log(error);
        })
    },
    watch: {
        selected_student: function (newValue) {
            alert(newValue)

            const self = this;

            axios({
                method: 'post',
                url: '/assets/api/research/get_researchs.php?selected_student=' + newValue,
                data: null,
                config: null
            }).then(function (response) {
                self.researches = response.data;
                console.log(response.data);
            }).catch(function (error) {
                // handle error
                console.log(error);
            })
        }
    }
});