<template>
	<!-- New Table -->
	<div class="w-full overflow-hidden rounded-lg shadow-xs">
		<div class="w-full overflow-x-auto">
			<table class="w-full whitespace-no-wrap">
				<thead>
					<tr
						class="
							text-xs
							font-semibold
							tracking-wide
							text-left text-gray-500
							uppercase
							border-b
							dark:border-gray-700
							bg-gray-50
							dark:text-gray-400
							dark:bg-gray-800
						"
					>
						<th class="px-4 py-3">User(Patient)</th>
						<th class="px-4 py-3">Email</th>
						<th class="px-4 py-3">Phone no</th>
						<th class="px-4 py-3">Registerd At</th>
					</tr>
				</thead>
				<tbody
					class="
						bg-white
						divide-y
						dark:divide-gray-700
						dark:bg-gray-800
					"
				>
					<tr
						class="text-gray-700 dark:text-gray-400"
						v-for="patient in patients"
						:key="patient.id"
					>
						<td class="px-4 py-3">
							<div class="flex items-center text-sm">
								<div>
									<p class="font-semibold">
										{{ patient.name ? patient.name : "N/A" }}
									</p>
									<p
										class="
											text-xs text-gray-600
											dark:text-gray-400
										"
									>
										patient
									</p>
								</div>
							</div>
						</td>
						<td class="px-4 py-3 text-sm">
							{{ patient.email ? patient.email : "N/A" }}
						</td>
						<td class="px-4 py-3 text-xs">
							{{ patient.phone_no ? patient.phone_no : "N/A" }}
						</td>
                        <td class="px-4 py-3 text-xs">
							{{ moment(patient.created_at).fromNow() }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>
<script>
import patientService from "../../../services/patientService";
import { ref } from "vue";
import moment from 'moment';

export default {
	async setup() {
		const response = ref(await patientService.getPatients());
		const patients = response.value.data.data;

		return {
			patients,
            moment
		};
	},
};
</script>
