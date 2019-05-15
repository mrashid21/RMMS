Vue.use(window["vue-js-modal"].default)

var app = new Vue({
    el: '#app',
    data: {
        name: null,
        budget: null,
        contributers: null,
        status: null,
        completion: null,
        researches: [],
        mode: 'save',
        model: null
    },
    methods: {
        onSubmit(){
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
                this.name = "";
                this.budget = "";
                this.contributers = "";
                this.status = "";
                this.completion = "";
            }).catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        add(name, budget, contributers, status, completion) {
            this.mode = 'save';
            console.log(name, budget, contributers, status, completion);
            this.researches.push({
                name: name,
                budget: budget,
                contributers: contributers,
                status: status,
                completion: completion
            });
        
            this.$modal.hide('researchForm');
        },
        update(name, budget, contributers, status, completion) {
            this.remove(this.model);
            this.add(name, budget, contributers, status, completion);
        },
        edit(x) {
            this.mode = 'edit'
            this.model = x
            this.name = x.name;
            this.budget = x.budget;
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
    }
});