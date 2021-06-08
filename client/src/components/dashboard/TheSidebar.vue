<template>
	<aside
		class="
			z-20
			hidden
			w-64
			overflow-y-auto
			bg-white
			dark:bg-gray-800
			md:block
			flex-shrink-0
		"
	>
		<div class="py-4 text-gray-500 dark:text-gray-400">
			<a
				class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
				href="#"
			>
				5MG
			</a>
			<ul class="mt-6">
				<li v-if="roleId == 1" class="relative px-6 py-3">
					<span
						class="
							absolute
							inset-y-0
							left-0
							w-1
							bg-purple-600
							rounded-tr-lg rounded-br-lg
						"
						aria-hidden="true"
					></span>
					<router-link :to="{ name: 'admin.home' }">
						<a
							class="
								inline-flex
								items-center
								w-full
								text-sm
								font-semibold
								text-gray-800
								transition-colors
								duration-150
								hover:text-gray-800
								dark:hover:text-gray-200
								dark:text-gray-100
							"
						>
							<svg
								class="w-5 h-5"
								aria-hidden="true"
								fill="none"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
								></path>
							</svg>
							<span class="ml-4">Dashboard</span>
						</a>
					</router-link>
				</li>
				<li v-if="roleId == 1" class="relative px-6 py-3">
					<router-link :to="{ name: 'admin.specialities' }">
						<a
							class="
								inline-flex
								items-center
								w-full
								text-sm
								font-semibold
								text-gray-800
								transition-colors
								duration-150
								hover:text-gray-800
								dark:hover:text-gray-200
								dark:text-gray-100
							"
						>
							<svg
								xmlns="http://www.w3.org/2000/svg"
								class="h-5 w-5"
								fill="none"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
								/>
							</svg>
							<span class="ml-4">Speciality</span>
						</a>
					</router-link>
				</li>

                <li v-if="roleId == 2" class="relative px-6 py-3">
					<span
						class="
							absolute
							inset-y-0
							left-0
							w-1
							bg-purple-600
							rounded-tr-lg rounded-br-lg
						"
						aria-hidden="true"
					></span>
					<router-link :to="{ name: 'doctor.home' }">
						<a
							class="
								inline-flex
								items-center
								w-full
								text-sm
								font-semibold
								text-gray-800
								transition-colors
								duration-150
								hover:text-gray-800
								dark:hover:text-gray-200
								dark:text-gray-100
							"
						>
							<svg
								class="w-5 h-5"
								aria-hidden="true"
								fill="none"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
								></path>
							</svg>
							<span class="ml-4">Dashboard</span>
						</a>
					</router-link>
				</li>
                <li v-if="roleId == 2" class="relative px-6 py-3">
					<router-link :to="{ name: 'doctor.schedule' }">
						<a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
							<span class="ml-4">Schedule</span>
						</a>
					</router-link>
				</li>

                <li v-if="roleId == 3" class="relative px-6 py-3">
					<span
						class="
							absolute
							inset-y-0
							left-0
							w-1
							bg-purple-600
							rounded-tr-lg rounded-br-lg
						"
						aria-hidden="true"
					></span>
					<router-link :to="{ name: 'patient.home' }">
						<a
							class="
								inline-flex
								items-center
								w-full
								text-sm
								font-semibold
								text-gray-800
								transition-colors
								duration-150
								hover:text-gray-800
								dark:hover:text-gray-200
								dark:text-gray-100
							"
						>
							<svg
								class="w-5 h-5"
								aria-hidden="true"
								fill="none"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								viewBox="0 0 24 24"
								stroke="currentColor"
							>
								<path
									d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
								></path>
							</svg>
							<span class="ml-4">Dashboard</span>
						</a>
					</router-link>
				</li>
                <li v-if="roleId == 3" class="relative px-6 py-3">
					<router-link :to="{ name: 'patient.appointment.create' }">
						<a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
							<span class="ml-4">Make an appointment</span>
						</a>
					</router-link>
				</li>
			</ul>
		</div>
		<div class="ml-6 text-sm dark:text-gray-50">
			<span
				class="
					px-2
					py-1
					font-semibold
					leading-tight
					text-gray-700
					bg-gray-100
					rounded-full
					dark:text-gray-100
					dark:bg-gray-700
				"
			>
				{{ roles[roleId - 1] }}
			</span>
		</div>
	</aside>
</template>
<script setup>
import { ref } from "vue";
import { computed } from "vue";
import { useStore } from "vuex";

const isPagesMenuOpen = ref(false);
const roles = ["Administrator", "Doctor", "Patient"];

function togglePagesMenu() {
	isPagesMenuOpen.value = !isPagesMenuOpen.value;
}

const store = useStore();

const name = computed(() => store.state.currentUser.name);
const roleId = computed(() => store.state.currentUser.role_id);
</script>
