import './bootstrap';

import { createApp } from 'vue';
import Select2 from 'vue3-select2-component';

const app = createApp({});

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.component('Select2', Select2)
app.mount('#app')
