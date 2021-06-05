import Api from "./ApiService";

export default {
    getSchedules() {
        return Api().get("/api/doctor/schedules");
    },

    updateSchedule(id, schedule) {
        return Api().put("/api/doctor/schedules/" + id, schedule);
    }
};