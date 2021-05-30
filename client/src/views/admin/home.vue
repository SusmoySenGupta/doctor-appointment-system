<template>
	<div class="container px-6 mx-auto grid">
		<h2
			class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
		>
			Dashboard
		</h2>
		<Card></Card>
		<router-link :to="{ name: 'admin.doctor.create' }" class="mb-4">
			<a
				class="
					px-3
					py-2
					text-sm
					font-medium
					leading-5
					text-white
					transition-colors
					duration-150
					bg-purple-600
					border border-transparent
					rounded-lg
					active:bg-purple-600
					hover:bg-purple-700
					focus:outline-none
					focus:shadow-outline-purple
				"
			>
				Add Doctor
			</a>
		</router-link>

		<suspense>
			<template #default>
				<AdminTable></AdminTable>
			</template>
			<template #fallback>
				<AdminTableSkeleton />
			</template>
		</suspense>
	</div>
</template>

<script setup>
import Card from "../../components/Card.vue";
import AdminTable from "../../components/admin/table/AdminTable.vue";
import AdminTableSkeleton from "../../components/admin/table/AdminTableSkeleton.vue";
</script>

<style></style>
