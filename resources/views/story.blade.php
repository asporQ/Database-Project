<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 text-right flex justify-end">
                <button id="switch-language"
                    class="mt-16 px-4 py-2 bg-yellowy text-xl text-white rounded hover:bg-ye transition duration-300">Switch
                    Language</button>
            </div>
            <div class="overflow-hidden sm:rounded-lg bg-white shadow-md">
                <div class="p-6 sm:px-20 border-b border-gray-300">
                    <!-- Title -->
                    <div id="title" class="text-5xl font-extrabold mb-6 text-center text-black">
                        The Story of "So Far So Good"
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Images and Text Content -->
                        <div class="col-span-1 lg:col-span-2 flex justify-center">
                            <img src="story1.png" alt="Uncle Joe" class="rounded-lg shadow-lg h-60 w-full object-cover">
                        </div>
                        <div id="text-1"
                            class="col-span-1 lg:col-span-2 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            There once was a man named Uncle Joe, who had two great loves in life: his family and a cold
                            beer at the end of a long day
                        </div>
                        <div class="col-span-1 flex justify-center lg:order-2">
                            <img src="story2.png" alt="Beer Shop" class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-2"
                            class="col-span-1 lg:order-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            One evening, as he sat with his favorite beer, Uncle Joe had a grand idea. He wanted to
                            share his love for beer with the world
                        </div>
                        <div class="col-span-1 flex justify-center">
                            <img src="story4.png" alt="Community"
                                class="rounded-lg shadow-lg h-full w-full object-cover">
                        </div>
                        <div id="text-3" class="col-span-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            With determination, Uncle Joe opened the doors to "So Far So Good". People came from near
                            and far to try the wide variety of beers and spirits
                        </div>
                        <div class="col-span-1 flex justify-center lg:order-2">
                            <img src="story5.png" alt="Online Shop"
                                class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-4"
                            class="col-span-1 lg:col-span-2 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            Years went by, and Uncle Joe’s son, Mark, grew up watching his father’s passion for beer and
                            the joy it brought to others
                        </div>
                        <div class="col-span-1 flex justify-center lg:order-2">
                            <img src="story6.png" alt="Online Shop"
                                class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-5"
                            class="col-span-1 lg:order-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            Uncle Joe smiled, proud of his son’s vision. Together, they created an online shop for "So
                            Far So Good"
                        </div>
                        <div class="col-span-1 flex justify-center">
                            <img src="story7.png" alt="Success" class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-6" class="col-span-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            The online shop became a huge success, attracting customers from all over the country who
                            appreciated the unique selection of beers
                        </div>
                        <div class="col-span-1 flex justify-center lg:order-1">
                            <img src="story8.png" alt="Innovation"
                                class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-7"
                            class="col-span-1 lg:order-2 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            Mark continued to innovate, introducing new flavors and brewing techniques that kept
                            customers coming back for more
                        </div>
                        <div class="col-span-1 flex justify-center">
                            <img src="story9.png" alt="Community" class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-8" class="col-span-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            The community around "So Far So Good" grew stronger, with regular events and tastings that
                            brought people together
                        </div>
                        <div class="col-span-1 flex justify-center lg:order-1">
                            <img src="story10.png" alt="Newspaper"
                                class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-9"
                            class="col-span-1 lg:order-2 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            Uncle Joe and Mark's story was featured in local newspapers and magazines, inspiring others
                            to follow their passion
                        </div>
                        <div class="col-span-1 flex justify-center">
                            <img src="story11.png" alt="Household Name"
                                class="rounded-lg shadow-lg h-64 w-full object-cover">
                        </div>
                        <div id="text-10" class="col-span-1 text-xl leading-relaxed mb-6 text-justify text-gray-700">
                            Today, "So Far So Good" is a household name, known for its quality and the love that goes
                            into every bottle
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-6 mt-12">
        <div class="container mx-auto text-center text-black">
            <p>&copy; 2024 So Far So Good Shop. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Language Switching -->
    <script>
        const translations = {
            en: {
                title: 'The Story of "So Far So Good"',
                "text-1": 'There once was a man named Uncle Joe, who had two great loves in life: his family and a cold beer at the end of a long day...',
                "text-2": 'One evening, as he sat with his favorite beer, Uncle Joe had a grand idea. He wanted to share his love for beer with the world...',
                "text-3": 'With determination, Uncle Joe opened the doors to "So Far So Good". People came from near and far to try the wide variety of beers and spirits...',
                "text-4": 'Years went by, and Uncle Joe’s son, Mark, grew up watching his father’s passion for beer and the joy it brought to others...',
                "text-5": 'Uncle Joe smiled, proud of his son’s vision. Together, they created an online shop for "So Far So Good"...',
                "text-6": 'The online shop became a huge success, attracting customers from all over the country who appreciated the unique selection of beers...',
                "text-7": 'Mark continued to innovate, introducing new flavors and brewing techniques that kept customers coming back for more...',
                "text-8": 'The community around "So Far So Good" grew stronger, with regular events and tastings that brought people together...',
                "text-9": 'Uncle Joe and Mark\'s story was featured in local newspapers and magazines, inspiring others to follow their passion...',
                "text-10": 'Today, "So Far So Good" is a household name, known for its quality and the love that goes into every bottle...'
            },
            de: {
                title: 'Die Geschichte von "So Far So Good"',
                "text-1": 'Es war einmal ein Mann namens Onkel Joe, der zwei große Lieben im Leben hatte: seine Familie und ein kühles Bier am Ende eines langen Tages...',
                "text-2": 'Eines Abends, während er sein Lieblingsbier trank, hatte Onkel Joe eine grandiose Idee. Er wollte seine Liebe zum Bier mit der Welt teilen...',
                "text-3": 'Mit Entschlossenheit öffnete Onkel Joe die Türen zu "So Far So Good". Menschen kamen von nah und fern, um die große Auswahl an Bieren und Spirituosen zu probieren...',
                "text-4": 'Im Laufe der Jahre wuchs Onkel Joes Sohn Mark auf und sah die Leidenschaft seines Vaters für Bier und die Freude, die es anderen brachte...',
                "text-5": 'Onkel Joe lächelte, stolz auf die Vision seines Sohnes. Gemeinsam schufen sie einen Online-Shop für "So Far So Good"...',
                "text-6": 'Der Online-Shop wurde ein großer Erfolg und zog Kunden aus dem ganzen Land an, die die einzigartige Auswahl an Bieren schätzten...',
                "text-7": 'Mark setzte die Innovation fort und führte neue Geschmacksrichtungen und Brautechniken ein, die die Kunden immer wieder zurückbrachten...',
                "text-8": 'Die Gemeinschaft rund um "So Far So Good" wurde stärker, mit regelmäßigen Veranstaltungen und Verkostungen, die die Menschen zusammenbrachten...',
                "text-9": 'Die Geschichte von Onkel Joe und Mark wurde in lokalen Zeitungen und Zeitschriften vorgestellt und inspirierte andere, ihrer Leidenschaft zu folgen...',
                "text-10": 'Heute ist "So Far So Good" ein bekannter Name, bekannt für seine Qualität und die Liebe, die in jede Flasche fließt...'
            }
        };

        let currentLanguage = 'en';

        document.getElementById('switch-language').addEventListener('click', () => {
            currentLanguage = currentLanguage === 'en' ? 'de' : 'en';
            document.getElementById('title').textContent = translations[currentLanguage].title;
            document.getElementById('text-1').textContent = translations[currentLanguage]["text-1"];
            document.getElementById('text-2').textContent = translations[currentLanguage]["text-2"];
            document.getElementById('text-3').textContent = translations[currentLanguage]["text-3"];
            document.getElementById('text-4').textContent = translations[currentLanguage]["text-4"];
            document.getElementById('text-5').textContent = translations[currentLanguage]["text-5"];
            document.getElementById('text-6').textContent = translations[currentLanguage]["text-6"];
            document.getElementById('text-7').textContent = translations[currentLanguage]["text-7"];
            document.getElementById('text-8').textContent = translations[currentLanguage]["text-8"];
            document.getElementById('text-9').textContent = translations[currentLanguage]["text-9"];
            document.getElementById('text-10').textContent = translations[currentLanguage]["text-10"];
        });
    </script>

</x-app-layout>