<div class="content">
    <h1> Panel Admina </h1>
    <p> Witaj w panelu admina. Za jego pomocą możesz edytować, dodawać oraz usuwać treść na stronie.</p>
    <h2> Lista zadań </h2>
    <div style="display: flex;">
        <div>
            <div id="progress" style="margin-bottom: 64px; width: 100%; height: 32px; border: 1px solid black; margin-top: 32px; position: relative;">
                <div id="innerProgress" style="background: green; height: 32px; position: absolute; top: 0; left: 0;"></div>
            </div>
            <p> Lista rzeczy które pozostało zrobić abym się nie pogubił. </p>
            <ol id="tido" style="max-width: 480px; line-height: 1.4em;">
                <li style="color: green;" class="done">Strony - coś się nie wyświetla, muszę sprawdzić kontroler, sprawdzić model, sprawdzić routing</li>
                <li style="color: green;" class="done">Tagi - Zmodyfikować bazę danych, aby każdy post mógł oprócz kategorii mieć także swoje tagi - jedna kolumna "tags", a w niej numery ID tagów.
                Tagi oddzielone przecinkami.
                    <ol>
                        <li style="color: green;" class="done">To teraz, trzeba dodać możliwość dodawania tagów do postów. UWAGA! Zapisane tagi muszą być oddzielone przecinkami (,) - ale ostatnim znakiem w kolumnie nie może być przecinek! </li>
                        <li style="color: green;" class="done"> No tak, zapomniałem, że trzeba będzie dodać nowy $route dla tagów - to znaczy jak ktoś kliknie w tag, mają się wyświetlić posty z danym tagiem a żeby url'e miały sens to potrzebny osony route. </li>
                        <li style="color: green;" class="done"> Sam $route nie wystarczy - trzeba dodać tabelę pośrednią zawierającą ID postów i ID tagów przypisanych. W ramach wyszukiwania po tagach (czyli w ramach $route dla tagu) szukamy ID posta w tabeli z połaczeniem postów i tagów.</li> 
                        <li style="color: green;" class="done"> Helpery dla generowania listy szablonów kategorii, listy szablonów postów, generator listy tagów, generator kategorii.</li> 
                    </ol>
                </li>
                <li style="color: green;" class="done">W podglądzie postów i kategorii - dodać kolumnę z linkiem do podglądu na stronie, target="_blank" 
                    <ol>
                        <li class="done">Dla kategorii - link: c-(:$cat_slug)</li>
                        <li class="done">Dla Posta - link: c-($cat_slug)/($post_slug)</li>
                        <li class="done">Dla strony - link: p-($slug)</li>
                    </ol>
                </li>
                <li style="color: green;" class="done">Pętle - spróbować wylistować na froncie wszystkie kategorie oraz posty, a także wszystkie post z danej kategorii</li>
                <li style="color: green;" class="done">Grafiki - Dodać możliwość dodawania przypiętego obrazka do kategorii i posta - może jakiś helper? Grafiki już się zaczytuję, wysztarczy do bazy danych wrzucić link do grafiki, a szablonie się do niego odwołać.</li>
                <li style="color: green;" class="done">Linkowanie tagów - pętla postów które zawierają dany tag</li>
                <li style="color: green;" class="done">Modyfikacja systemu zdjęć - myślę nad helperem i ajaxem, a jeśli będzie trzeba, to na chama jQuery i zewnętrzny plik.php z funkcją listującą pliki</li>
                <li style="color: green;" class="done">Dodać skrypcik który pozwoli na kliknięcie w grafikę która ma być zdjęciem posta/kategorii <span style="color: red;">Ogarnięto inaczej - w sumie wystarczy przeciągnąć i upuścić obrazek w pole "Grafika reprezentująca post". Wygodne, działa.</span></li>
                <li style="color: green;" class="done">Modyfikacja bazy danych - dodać przy postach kolumnę "Full link" - ułatwi to linkowanie przy tagach itd. Poprawić pętle z tagami, tak aby korzystała z nowej kolumny.</li>
                <li style="color: red;" class="done">Zmiana planów - nie dodaje ustawień serwisu, ale dodaje przy postach opcje wyboru czy post ma być promowany, albo wyróżniony w randomach.</li>
                <li>Paginacja - raczej tylko dla postów + zrobić widok ze wszystkimi postami od najnowszych.</li>
                <li style="color: green;" class="done">Wyszukiwarka</li>
            </ol>
        </div>
    </div>
    <div style="clear: both;"></div>
    <hr>
    <p> Odległa przyszłość. </p>
    <ol style="max-width: 480px; line-height: 1.4em;">
        <li>System oceniania artykułów + komentarze, bez rejestracji do bazy, po zatwierdzeniu - wyświetl pod postem. ReCaptcha</li>
    </ol>
</div>
<script>
    let all = document.querySelectorAll('#tido li'),
        done = document.querySelectorAll('#tido li.done'),
        progress = (done.length)/(all.length);
    document.querySelector('#innerProgress').style.width=(100*progress)+'%';
    document.querySelector('#innerProgress').innerText=(100*progress)+'%';
</script>