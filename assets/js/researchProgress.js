Vue.use(window["vue-js-modal"].default)

var app = new Vue({
    el: '#app',
    data: {
        name: null,
        contributers: null,
        status: null,
        completion: null,
        researches: [],
        mode: 'save',
        model: null
    },
    methods: {
        onSubmit(){
            const self = this;

            var bodyFormData = new FormData();
            bodyFormData.set('research-name', this.name);
            bodyFormData.set('research-status', this.status);
            bodyFormData.set('research-contributers', this.contributers);
            bodyFormData.set('research-completionPercentage', this.completion);
            axios({
                    method: 'post',
                    url: '/assets/api/create_research.php',
                    data: bodyFormData,
                    config: null
            }).then(function (response) {
                alert('Submitted!')
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
        add(name, contributers, status, completion) {
            this.mode = 'save';
            console.log(name, contributers, status, completion);

        
            this.$modal.hide('researchForm');
        },
        update(name,  contributers, status, completion) {
            this.remove(this.model);
            this.add(name,  contributers, status, completion);
        },
        edit(x) {
            this.mode = 'edit'
            this.model = x
            this.name = x.name;
            this.contributers = x.contributers;
            this.status = x.status;
            this.completion = x.completion;
            this.$modal.show('researchForm');
            console.log(axios);
        },
        remove(x) {
            let idx = this.researches.indexOf(x);
            this.researches.splice(idx, 1);
        },
        statusColor(x) {
            if (x == 'completed') {
                return ' bg-success'
            }
            else if(x == 'pending'){
                return 'bg-warning'
            }
            else if(x == 'completed'){
                return 'bg-success'
            }
            return ' bg-danger'
        }
    },
    created(){
        const self = this;

        axios({
            method: 'post',
            url: '/assets/api/get_research.php',
            data: null,
            config: null
            }).then(function (response) {
                self.researches = response.data;
            }).catch(function (error) {
                // handle error
                console.log(error);
            })
    }
});