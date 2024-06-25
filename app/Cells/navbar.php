<nav class="bg-white dark:bg-gray-900 fixed left-0 right-0 top-0 z-30 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="<?= base_url("/") ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="<?= base_url("assets/img/vector.svg") ?>" class="h-8 md:h-10" alt="Logo Jabes Reis" />
            <div class=" dark:text-white flex  md:hidden lg:flex flex-col">
                <span class="text-lg md:text-xl font-thin whitespace-nowrap" id="navbar_page_name">Template</span>
            </div>
        </a>
        <button data-drawer-target="drawer-body-scrolling" data-drawer-show="drawer-body-scrolling"
            data-drawer-body-scrolling="true" aria-controls="drawer-body-scrolling" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none  dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>
</nav>




<!-- drawer component -->
<div id="drawer-body-scrolling"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-body-scrolling-label">
    <h5 id="drawer-body-scrolling-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
    </h5>
    <button type="button" data-drawer-hide="drawer-body-scrolling" aria-controls="drawer-body-scrolling"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="<?= base_url("dashboard") ?>"
                    class="flex items-center p-2 <?= uri_string() === "dashboard" ? "bg-blue-700 text-white" : "text-gray-900 hover:bg-gray-100 hover:text-gray-700  dark:text-white" ?> rounded-lg   group">
                    <svg class="w-5 h-5  transition duration-75  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <?php foreach ($links as $link): ?>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="<?= esc($link["dropdown_name"]) ?>">
                        <i class="<?= esc($link["icon"]) ?>"></i>
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap "><?= esc($link["title"]) ?></span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="<?= esc($link["dropdown_name"]) ?>" class="hidden py-2 space-y-2">
                        <?php foreach (esc($link["methods"]) as $action): ?>
                            <li class="hover:bg-gray-100 rounded-lg dark:hover:bg-gray-700">
                                <a href="<?= base_url() . "" . esc($action["uri"]) ?>"
                                    class="flex items-center w-full p-2 <?= uri_string() === esc($action["uri"]) ? "text-white bg-blue-700 md:text-blue-700" : "text-gray-900 hover:bg-gray-100" ?>transition duration-75 rounded-lg pl-11 group  dark:text-white"><?= esc($action["title"]) ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>

            <?php endforeach ?>
            <br><br>
            <li class="mt-8">
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                </a>
            </li>
            <li class="hover:bg-gray-100 dark:hover:bg-gray-700 group p-1.5 rounded-lg">
                <a href="#"
                    class="block py-2 px-3 text-gray-900 rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:text-white md:dark:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700">
                    <label class="flex items-center me-5 cursor-pointer justify-between">
                        <span class=" text-gray-900 dark:text-white">
                            <i
                                class="mdi mdi-theme-light-dark mr-8 text-xl md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"></i>
                        </span>
                        <input type="checkbox" class="sr-only peer" id="toggle_theme">
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer  dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                    </label>
                </a>
            </li>
        </ul>
    </div>
</div>


<script>

    const setTheme = () => {
        const localTheme = localStorage.getItem("theme") || false

        if (localTheme) {
            if (localTheme === "light") {
                $("html").removeClass("dark")
            }

            if (localTheme === "dark") {
                $("html").addClass("dark")
                $("#toggle_theme").attr("checked", true)
            }
        }

        const theme = document.getElementById("toggle_theme")

        theme.addEventListener("change", (e) => {

            if (!theme.checked) {
                $("html").removeClass("dark")
                localStorage.removeItem("theme")
                return
            }

            $("html").addClass("dark")
            localStorage.setItem("theme", "dark")
        })
    }

    setTheme()

    const manipulatePageName = () => {
        const uri = "<?= uri_string() ?>"

        const pageName = uri.split('/')

        $("#navbar_page_name").html(pageName[0].toUpperCase())
    }

    manipulatePageName()
</script>