import AppForm from '../app-components/Form/AppForm';

Vue.component('sex-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});