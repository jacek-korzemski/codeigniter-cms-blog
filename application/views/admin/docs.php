<div class="content">
    <h1> Dokumentacja </h1>
    <p> Najważniejsze informacje potrzebne do budowania szablonu, a także do dalszej modyfikacji systemu. Lista funkcji zawartych w odpowiednich helperach. </p>
    <h2> Szablony i dane w szablonach </h2>
    <p> Wszystki szablony z sekcji innej niż "Admin" korzystają ze wspólnych plików header.php oraz footer.php zawartch w sekcji "strony" (pages). </p>
    <ul>
        <li>Sekcja - Admin
            <ol>
                <li>add.php - dodawanie nowych stron</li>
                <li>add_block.php - dodawanie nowych bloków</li>
                <li>add_category.php - dodawanie nowych kategorii</li>
                <li>add_media.php - dodawnie plików graficznych</li>
                <li>add_post.php - dodawnie nowego posta</li>
                <li>blocks.php - lista utworzonych bloków</li>
                <li>categories.php - lista utworzonych kategorii</li>
                <li>dashboard.php - strona główna panelu admina, domyślnie instrukcja obsługi z poziomu panelu</li>
                <li>docs.php - obecnie otwarty szablon zawierający dokumentację</li>
                <li>edit.php - edycja uprzednio utworzonej strony</li>
                <li>edit_block.php - edycja uprzednio utworzonego bloku</li>
                <li>edit_category.php - edycja uprzednio utworzonej kategorii</li>
                <li>edit_post.php - edycja uprzednio utworzonego posta</li>
                <li>footer.php - szablon stopki panelu admina - domyślnie zawiera JavaScript</li>
                <li>header.php - szablon głównej części szablonu, menu boczne, metadane, style</li>
                <li>login.php - szablon logowania do panelu</li>
                <li>media.php - podgląd obrazków dodanych na stronę</li>
                <li>pages.php - lista utworzonych stron</li>
                <li>posts.php - lista utworzonych postów</li>
                <li>tags.php - lista utworzonych tagów + formularz dodawania nowyc</li>
            </ol>
        </li>
        <li style="margin-top: 32px;"> Sekcja - Category - szablony dla poszczególnych kategorii.
            <ol>
                <li>basic.php - domyślny wygląd szablony</li>
                <li>book.php - szablon dla kategorii o książkach</li>
                <li>event.php - szablon dla kategorii o wydarzeniach</li>
                <li>game.php - szablon dla kategorii o grach</li>
                <li>music.php - szablon dla kategorii o muzyce</li>
                <li>Dane przekazywane do szablonów kategorii: 
                    <ol>
                        <li>name - nazwa kategorii</li>
                        <li>cat_slug - segment adresu url odpowiadający za kategorię</li>
                        <li>seo_title - tytuł SEO dla kategorii</li>
                        <li>seo_desc - opis SEO dla kategorii</li>
                        <li>seo_robots - ustawienia meta robots dla kategorii</li>
                        <li>description - opis do wyświetlenia na stronie kategorii</li>
                        <li>posts - tabela zawierające podtabele z informacjami dla wszystkich postów w kategorii. W szablonie do wykorzystania w pętli.</li>
                        <li>post['id'] - numer ID posta</li>
                        <li>post['title'] - tytuł posta</li>
                        <li>post['post_slug'] - segment adresu url odpowiadający danemu postowi</li>
                        <li>post['body'] - treść posta</li>
                        <li>post['created_at'] - data utworzenia posta</li>
                        <li>post['seo_title'] - tytuł SEO dla posta w danej kategorii</li>
                        <li>post['seo_description'] - opis SEO dla posta w danej kategorii</li>
                        <li>post['seo_robots'] - ustawienia meta robots dla danego posta</li>
                        <li>post['category_id'] - numer ID kategorii do której należy post</li>
                        <li>post['tags'] - numery ID tagów przypisanych do posta (aby uzyskać listę tagów, można skorzystać z funkcji get_post_tags($post['id']);</li>
                        <li>category - nazwa kategorii, już wyciągnięta za pomocą funkcji get_category_name($data['category_id'])</li>
                    </ol>
                </li>
            </ol>
        </li>
        <li style="margin-top: 32px;"> Sekcja - Page - szablony dla poszczególnych stron utworzonych z poziomu CMS.
            <ol>
                <li>contact.php - szablon dla strony kontaktowej, ma własny route do metody w klasy Pages</li>
                <li>footer.php - globalna stopka dla całego frontu strony</li>
                <li>header.php - globalny nagłówek dla całego frontu strony</li>
                <li>home.php - szablon strony możliwy do wybrania z poziomu panelu admina</li>
                <li>page.php - szablon strony możliwy do wybrania z poziomu panelu admina</li>
                <li>Dane przekazywane do szablonów strony:
                    <ol>
                        <li>seo_title - tytuł SEO dla danej strony</li>
                        <li>seo_desc - opis SEO dla danej strony</li>
                        <li>seo_robots - ustawienia meta seo dla danej strony</li>
                        <li>title - wyświetlany tytuł danej strony</li>
                        <li>content - treść strony</li>
                        <li>date - data utworzenia strony</li>
                    </ol>
                </li>
                <li>Dane przekazywane do szablonu strony "Kontakt" korzystającej z metodoy contact_page() w klasie Pages:
                    <ol>
                        <li>seo_title - tytuł SEO dla strony</li>
                        <li>seo_desc - opis SEO dla strony</li>
                        <li>seo_robots - ustawienia meta robots dla strony</li>
                        <li>title - tytuł do wyświetlenia</li>
                    </ol>
                </li>
            </ol>
        </li>
        <li style="margin-top: 32px;"> Sekcja - Post - szablony dla poszczególnych postów utworzonych z poziomu CMS.
            <ol>
                <li>basic.php - domyślny szablon posta, uniwersalny</li>
                <li>book.php - szablon dla posta o książce</li>
                <li>event.php - szablon dla posta o wydarzeniu</li>
                <li>game.php - szablon dla posta o grze</li>
                <li>music.php - szablon dla posta o muzyce</li>
                <li>Dane przekazywane do szablonu posta: </li>
                    <ol>
                        <li>seo_title - tytuł SEO dla danego posta</li>
                        <li>seo_desc - opis SEO dla danego posta</li>
                        <li>seo_robots - ustawienia meta seo dla danego posta</li>
                        <li>title - wyświetlany tytuł danego posta</li>
                        <li>body - treść posta</li>
                        <li>date - data utworzenia posta</li>
                        <li>tags - tagi danego posta, już wyciągnięta z pomocą funckji get_post_tags($data['id']) w formie tabeli</li>
                        <li>category - kategoria posta, już wyciągnięta z pomocą funkcji get_category_name($data['category_id'])</li>
                    </ol>
            </ol>
        </li>
    </ul>

    <h2> Helpery - funkcje pomocnicze </h2>
    <p> Spis utworzonych funkcji mających na celu pomóc przy tworzeniu treści i modyfikacji systemu. </p>
    <ul>
        <li>admin_helper.php - zawiera funkcje wykorzystywane główne przy wsparciu zadań po stronie panelu admina
            <ol>
                <li>get_category_name($id) - zwraca nazwę kategorii na podstawie jej numeru ID</li>
                <li>get_category_slug($id) - zwraca segment URL danej kategorii na podstawie jej numeru ID</li>
                <li>get_category_id_by_slug($slug) - zwraca ID danej kategorii na podstawie jej fragmentu URL</li>
                <li>get_post_tags($id) - zwraca tabelę zawierającą tagi posta na podstawie jego ID</li>
                <li>get_post_category($id) - zwraca numer ID kategorii przypisanej do posta o wstawionym numerze ID (posta)</li>
                <li>list_templates() - generuje listę wybieralną z szablonami stron (template)</li>
                <li>list_post_templates() - generuje listę wybieralną z szablonami dla postów w kategorii (post_template)</li>
                <li>list_category_templates() - generuje listę wybieralną z szablonami dla kategorii</li>
                <li>list_blocks_ids() - generuje listę wybieralną zawierającą dostępne pozycje dla bloków w szablonie</li>
                <li>build_tags_select_list() - generuje listę tagów na podstawie tagów w bazie danych</li>
            </ol>            
        </li>
        <li style="margin-top: 32px;">blok_helper.php - zawiera funkcje wykorzystywane przy wczytywaniu bloków w widoku strony
            <ol>
                <li>load_block('nazwa_pozycji') - wczytuje blok w danej pozycji, jeśli taki blok w bazie danych istnieje</li>
                <li>has_block('nazwa_pozycji') - zwraca TRUE jeśli w bazie danych jest blok przypisany dla danej pozycji dla danej strony</li>
                <li>check_if_selected($id, $slug) - wykorzystywany w panelu Admina, zaznacza wybraną pozycję w widoku edycji bloku jeśli był on przypisany do danej strony</li>
            </ol>
        </li>
        <li style="margin-top: 32px;">image_helper.php - zawiera funkcje wykorzystywane przy wyświetlaniu obrazów na stronie
            <ol>
                <li>list_images() - tworzy listę obrazków znajdujących się w folderze /assets/uploads/</li>
            </ol>
        </li>
        <li style="margin-top: 32px;">loops_helper.php - zawiera funkcje ułatwiające tworzenie pętli z treściami wyciągniętymi z bazy danych
            <ol>
                <li>loop_categories() - zwraca tabelę zawierającą wszystkie kategorie</li>
                <li>loop_post($category_id) - zwraca tabelę zawierającą wszystkie posty w danej kategorii. Jeśli kategoria nie została wybrana, zwraca tabelę ze wszystkimi postami.</li>
            </ol>
        </li>
    </ul>
</div>