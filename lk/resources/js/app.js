import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import './../less/app.less';
import HistoryBack from "@/Components/HistoryBack.vue";
const appName = import.meta.env.VITE_APP_NAME || 'VolyaVet LK';

import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import Callback from "@/Components/Popup/Callback.vue";

// Use plugin with optional defaults
import.meta.glob([
    '../images/**',
    '../fonts/**',
])

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(setupCalendar, {})
            .component('VCalendar', Calendar)
            .component('VDatePicker', DatePicker)
            .component('history-back', HistoryBack)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
