<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Account Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Username</th>
                        <td>{{ auth()->user()->userid }}</td>
                        <th>Account ID</th>
                        <td>
                            <span class="not-applicable">Not Applicable</span>
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>
                            {{ auth()->user()->email }}
                        </td>
                        <th>Group ID</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            {{ auth()->user()->sex->getLabel() }}
                        </td>
                        <th>State</th>
                        <td>
                            <span class="account-state state-normal">Normal<span>					</span></span></td>
                    </tr>
                    <tr>
                        <th>Login Count</th>
                        <td>9</td>
                        <th>Credit Balance</th>
                        <td>
                            0
                        </td>
                    </tr>
                    <tr>
                        <th>Birthdate</th>
                        <td colspan="3">1999-03-08</td>
                    </tr>
                    <tr>
                        <th>Last Login Date</th>
                        <td colspan="3">
                            2023-12-10 19:39:54
                        </td>
                    </tr>
                    <tr>
                        <th>Last Used IP</th>
                        <td colspan="3">
                            144.64.19.92
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
