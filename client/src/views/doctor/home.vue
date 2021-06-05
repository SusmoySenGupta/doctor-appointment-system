<template>
	<div class="container px-6 mx-auto grid">
		<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
			Dashboard
		</h2>
		<DoctorCard></DoctorCard>
        <h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
			Appointments
		</h2>
		<suspense>
			<template #default>
				<DoctorAppointmentTable></DoctorAppointmentTable>
			</template>
			<template #fallback>
				<DoctorAppointmentTableSkeleton />
			</template>
		</suspense>
	</div>
</template>

<script setup>
import DoctorCard from "../../components/doctor/DoctorCard.vue";
import DoctorAppointmentTable from "../../components/doctor/table/DoctorAppointmentTable.vue";
import DoctorAppointmentTableSkeleton from "../../components/doctor/table/DoctorAppointmentTableSkeleton.vue";

</script>
