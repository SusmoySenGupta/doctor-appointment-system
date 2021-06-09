import Api from "./ApiService";

export default {
    getUserDetails() {
        return Api().get("user");
    },
};