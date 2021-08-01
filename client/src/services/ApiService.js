import axios from "axios";

export default () => {
    return axios.create({
        baseURL: "https://susmoycse.com/laravel-vue/doctor-appointment-app/server/api/",
    });
};