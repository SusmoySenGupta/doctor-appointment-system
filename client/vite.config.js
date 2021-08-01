import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
    base: '/laravel-vue/doctor-appointment-app/',
    mode: 'production',
    plugins: [vue()]
})