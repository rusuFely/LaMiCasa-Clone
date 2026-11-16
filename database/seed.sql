-- Date initiale pentru catalogul LaMiCasa.
-- Categoriile principale nu au parinte (parent_id = NULL).
-- ID-ul este generat automat prin AUTO_INCREMENT.

INSERT INTO categories (name, slug, parent_id) VALUES
('Igiena personală', 'igiena-personala', NULL),
('Produse pentru casă', 'produse-pentru-casa', NULL),
('Spălarea și întreținerea rufelor', 'spalarea-si-intretinerea-rufelor', NULL),
('Transport pentru copii', 'transport-pentru-copii', NULL);

-- Adăugăm subcategoriile, parent_id = 1 reprezintă categoria „Igiena personală”
INSERT INTO categories (name, slug, parent_id) VALUES
('Corp', 'corp', 1),
('Deodorante/Antiperspirante', 'deodorante-antiperspirante', 1),
('Diverse', 'diverse-igiena-personala', 1),
('Gel de duș', 'gel-de-dus', 1),
('Igiena copii', 'igiena-copii', 1),
('Igiena intimă', 'igiena-intima', 1),
('Igiena orală', 'igiena-orala', 1),
('Îngrijire păr', 'ingrijire-par', 1),
('Parfumerie', 'parfumerie', 1),
('Pentru/după bărbierit', 'pentru-dupa-barbierit', 1),
('Săpun', 'sapun', 1),
('Săpun lichid', 'sapun-lichid', 1),
('Seturi', 'seturi', 1);
-- verificam: SELECT id, name, parent_id FROM categories WHERE parent_id = 1;

-- Nivelul 3: sub-subcategoriile pentru Igiena orala (id = 11).
INSERT INTO categories (name, slug, parent_id) VALUES
('Apă de gură', 'apa-de-gura', 11),
('Pastă de dinți', 'pasta-de-dinti', 11),
('Periuță de dinți', 'periuta-de-dinti', 11);
-- verificam: SELECT id, name, parent_id FROM categories WHERE parent_id = 11;

-- SELECT
--     c.name AS categorie,
--     s.name AS subcategorie,
--     ss.name AS subsubcategorie
-- FROM categories c
-- LEFT JOIN categories s ON s.parent_id = c.id
-- LEFT JOIN categories ss ON ss.parent_id = s.id
-- WHERE c.parent_id IS NULL
-- ORDER BY c.name, s.name, ss.name;

-- Nivelul 3: sub-subcategoriile pentru Ingrijire par (id = 12).
INSERT INTO categories (name, slug, parent_id) VALUES
('Balsam/Conditioner', 'balsam-conditioner', 12),
('Șampon', 'sampon', 12);
-- verificam: SELECT id, name, parent_id FROM categories WHERE parent_id = 12;

-- Nivelul 2: subcategoriile pentru Produse pentru casa (id = 2).
INSERT INTO categories (name, slug, parent_id) VALUES
('Bucătărie', 'bucatarie', 2),
('Detergenți universali', 'detergenti-universali', 2),
('Diverse', 'diverse-produse-casa', 2),
('Lavete/Mop', 'lavete-mop', 2),
('Odorizante', 'odorizante', 2),
('Pisici', 'pisici', 2),
('Produse din hârtie', 'produse-din-hartie', 2),
('Saci menajeri', 'saci-menajeri', 2),
('Soluții desfundat țevi', 'solutii-desfundat-tevi', 2),
('Soluții îngrijire baie și WC', 'solutii-ingrijire-baie-wc', 2),
('Soluții îngrijire mobilă', 'solutii-ingrijire-mobila', 2);
-- verificare: SELECT id, name, parent_id FROM categories WHERE parent_id = 2;

-- Nivelul 3: sub-subcategoriile pentru Bucatarie (id = 23).
INSERT INTO categories (name, slug, parent_id) VALUES
('Bureți', 'bureti', 23),
('Degresanți', 'degresanti', 23),
('Detergenți pentru mașina de spălat vase', 'detergenti-masina-spalat-vase', 23),
('Detergenți pentru vase', 'detergenti-pentru-vase', 23),
('Folie și pungi alimentare', 'folie-si-pungi-alimentare', 23);
-- verificare: SELECT id, name, parent_id FROM categories WHERE parent_id = 23;

-- Nivelul 3: sub-subcategoriile pentru Produse din hartie (id = 29).
INSERT INTO categories (name, slug, parent_id) VALUES
('Hârtie igienică', 'hartie-igienica', 29),
('Prosoape pentru bucătărie', 'prosoape-pentru-bucatarie', 29);
-- verificare: SELECT id, name, parent_id FROM categories WHERE parent_id = 29;

-- Nivelul 2: subcategoriile pentru Spalarea si intretinerea rufelor (id = 3).
INSERT INTO categories (name, slug, parent_id) VALUES
('Aditivi', 'aditivi', 3),
('Clătitor Rufe', 'clatitor-rufe', 3),
('Detergenți', 'detergenti', 3),
('Înălbitor', 'inalbitor', 3),
('Parfum Rufe', 'parfum-rufe', 3);
-- verificare: SELECT id, name, parent_id FROM categories WHERE parent_id = 3;

-- adaugam categoria principala produse alimentare
INSERT INTO categories (name, slug, parent_id)
VALUES ('Produse Alimentare', 'produse-alimentare', NULL);
-- verificam: SELECT id, name, parent_id FROM categories WHERE parent_id IS NULL;

-- Branduri initiale pentru testarea catalogului.
-- Fiecare brand este inregistrat o singura data.
-- Produsele vor fi asociate ulterior prin brand_id.
INSERT INTO brands (name, slug) VALUES
('Colgate', 'colgate'),
('Dove', 'dove'),
('Nivea', 'nivea'),
('Ariel', 'ariel'),
('Persil', 'persil');
-- verificam: SELECT * FROM brands;
