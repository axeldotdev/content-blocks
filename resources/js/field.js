import IndexField from './components/IndexField.vue';
import DetailField from './components/DetailField.vue';
import FormField from './components/FormField.vue';

Nova.booting((Vue, router, store) => {
    Vue.component('index-content-blocks', IndexField);
    Vue.component('detail-content-blocks', DetailField);
    Vue.component('form-content-blocks', FormField);
});
