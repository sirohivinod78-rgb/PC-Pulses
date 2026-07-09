<?php
/**
 * PC Builder Components Database
 * 
 * This file contains all available PC components for the builder
 */

return [
    'cpu' => [
        'category' => 'CPU (Processor)',
        'components' => [
            [
                'id' => 'cpu_1',
                'name' => 'Intel Core i5-13600K',
                'price' => 319.99,
                'socket' => 'LGA1700',
                'tdp' => 125,
                'cores' => 14,
                'threads' => 20,
                'image' => 'https://via.placeholder.com/300x200?text=Intel+i5',
                'specs' => ['14 Cores', '20 Threads', '125W TDP']
            ],
            [
                'id' => 'cpu_2',
                'name' => 'Intel Core i7-13700K',
                'price' => 409.99,
                'socket' => 'LGA1700',
                'tdp' => 253,
                'cores' => 16,
                'threads' => 24,
                'image' => 'https://via.placeholder.com/300x200?text=Intel+i7',
                'specs' => ['16 Cores', '24 Threads', '253W TDP']
            ],
            [
                'id' => 'cpu_3',
                'name' => 'AMD Ryzen 5 7600X',
                'price' => 229.99,
                'socket' => 'AM5',
                'tdp' => 105,
                'cores' => 6,
                'threads' => 12,
                'image' => 'https://via.placeholder.com/300x200?text=Ryzen+5',
                'specs' => ['6 Cores', '12 Threads', '105W TDP']
            ],
            [
                'id' => 'cpu_4',
                'name' => 'AMD Ryzen 7 7700X',
                'price' => 299.99,
                'socket' => 'AM5',
                'tdp' => 105,
                'cores' => 8,
                'threads' => 16,
                'image' => 'https://via.placeholder.com/300x200?text=Ryzen+7',
                'specs' => ['8 Cores', '16 Threads', '105W TDP']
            ]
        ]
    ],
    'motherboard' => [
        'category' => 'Motherboard',
        'components' => [
            [
                'id' => 'mb_1',
                'name' => 'ASUS ROG STRIX Z790-E',
                'price' => 389.99,
                'socket' => 'LGA1700',
                'ram_type' => 'DDR5',
                'form_factor' => 'ATX',
                'image' => 'https://via.placeholder.com/300x200?text=Z790+Mobo',
                'specs' => ['LGA1700', 'DDR5', 'ATX']
            ],
            [
                'id' => 'mb_2',
                'name' => 'ASUS ProArt Z790-CREATOR',
                'price' => 449.99,
                'socket' => 'LGA1700',
                'ram_type' => 'DDR5',
                'form_factor' => 'ATX',
                'image' => 'https://via.placeholder.com/300x200?text=Z790+Pro',
                'specs' => ['LGA1700', 'DDR5', 'ATX']
            ],
            [
                'id' => 'mb_3',
                'name' => 'MSI MPG B650E EDGE',
                'price' => 299.99,
                'socket' => 'AM5',
                'ram_type' => 'DDR5',
                'form_factor' => 'ATX',
                'image' => 'https://via.placeholder.com/300x200?text=B650E+Mobo',
                'specs' => ['AM5', 'DDR5', 'ATX']
            ],
            [
                'id' => 'mb_4',
                'name' => 'ASUS ROG STRIX X870-E',
                'price' => 449.99,
                'socket' => 'AM5',
                'ram_type' => 'DDR5',
                'form_factor' => 'ATX',
                'image' => 'https://via.placeholder.com/300x200?text=X870+Mobo',
                'specs' => ['AM5', 'DDR5', 'ATX']
            ]
        ]
    ],
    'gpu' => [
        'category' => 'Graphics Card (GPU)',
        'components' => [
            [
                'id' => 'gpu_1',
                'name' => 'NVIDIA RTX 4070',
                'price' => 599.99,
                'vram' => 12,
                'power_req' => 200,
                'image' => 'https://via.placeholder.com/300x200?text=RTX+4070',
                'specs' => ['12GB GDDR6X', '200W', 'PCIe 4.0']
            ],
            [
                'id' => 'gpu_2',
                'name' => 'NVIDIA RTX 4080',
                'price' => 1199.99,
                'vram' => 16,
                'power_req' => 320,
                'image' => 'https://via.placeholder.com/300x200?text=RTX+4080',
                'specs' => ['16GB GDDR6X', '320W', 'PCIe 4.0']
            ],
            [
                'id' => 'gpu_3',
                'name' => 'AMD Radeon RX 7700 XT',
                'price' => 399.99,
                'vram' => 12,
                'power_req' => 250,
                'image' => 'https://via.placeholder.com/300x200?text=RX7700',
                'specs' => ['12GB GDDR6', '250W', 'PCIe 4.0']
            ],
            [
                'id' => 'gpu_4',
                'name' => 'AMD Radeon RX 7900 XTX',
                'price' => 799.99,
                'vram' => 24,
                'power_req' => 420,
                'image' => 'https://via.placeholder.com/300x200?text=RX7900',
                'specs' => ['24GB GDDR6', '420W', 'PCIe 4.0']
            ]
        ]
    ],
    'ram' => [
        'category' => 'RAM (Memory)',
        'components' => [
            [
                'id' => 'ram_1',
                'name' => 'Kingston Fury Beast 32GB DDR5',
                'price' => 119.99,
                'capacity' => 32,
                'type' => 'DDR5',
                'speed' => 6400,
                'image' => 'https://via.placeholder.com/300x200?text=Kingston+32GB',
                'specs' => ['32GB', 'DDR5', '6400MHz']
            ],
            [
                'id' => 'ram_2',
                'name' => 'Corsair Dominator Platinum 32GB DDR5',
                'price' => 149.99,
                'capacity' => 32,
                'type' => 'DDR5',
                'speed' => 6000,
                'image' => 'https://via.placeholder.com/300x200?text=Corsair+32GB',
                'specs' => ['32GB', 'DDR5', '6000MHz']
            ],
            [
                'id' => 'ram_3',
                'name' => 'G.Skill Trident Z5 64GB DDR5',
                'price' => 249.99,
                'capacity' => 64,
                'type' => 'DDR5',
                'speed' => 6000,
                'image' => 'https://via.placeholder.com/300x200?text=GSkill+64GB',
                'specs' => ['64GB', 'DDR5', '6000MHz']
            ],
            [
                'id' => 'ram_4',
                'name' => 'Corsair Vengeance 32GB DDR5',
                'price' => 129.99,
                'capacity' => 32,
                'type' => 'DDR5',
                'speed' => 5600,
                'image' => 'https://via.placeholder.com/300x200?text=Corsair+Vengeance',
                'specs' => ['32GB', 'DDR5', '5600MHz']
            ]
        ]
    ],
    'storage' => [
        'category' => 'Storage (SSD/HDD)',
        'components' => [
            [
                'id' => 'storage_1',
                'name' => 'Samsung 990 Pro 2TB NVMe SSD',
                'price' => 179.99,
                'capacity' => 2,
                'type' => 'NVMe SSD',
                'speed' => 7100,
                'image' => 'https://via.placeholder.com/300x200?text=Samsung+2TB',
                'specs' => ['2TB', 'NVMe Gen4', '7100MB/s']
            ],
            [
                'id' => 'storage_2',
                'name' => 'WD Black SN850X 1TB NVMe SSD',
                'price' => 89.99,
                'capacity' => 1,
                'type' => 'NVMe SSD',
                'speed' => 7100,
                'image' => 'https://via.placeholder.com/300x200?text=WD+Black+1TB',
                'specs' => ['1TB', 'NVMe Gen4', '7100MB/s']
            ],
            [
                'id' => 'storage_3',
                'name' => 'Seagate Barracuda 4TB HDD',
                'price' => 79.99,
                'capacity' => 4,
                'type' => 'HDD',
                'speed' => 0,
                'image' => 'https://via.placeholder.com/300x200?text=Seagate+4TB',
                'specs' => ['4TB', '3.5" HDD', '5400RPM']
            ],
            [
                'id' => 'storage_4',
                'name' => 'Crucial P5 Plus 2TB NVMe SSD',
                'price' => 159.99,
                'capacity' => 2,
                'type' => 'NVMe SSD',
                'speed' => 6600,
                'image' => 'https://via.placeholder.com/300x200?text=Crucial+2TB',
                'specs' => ['2TB', 'NVMe Gen4', '6600MB/s']
            ]
        ]
    ],
    'psu' => [
        'category' => 'Power Supply (PSU)',
        'components' => [
            [
                'id' => 'psu_1',
                'name' => 'Corsair RM850x 850W',
                'price' => 139.99,
                'wattage' => 850,
                'efficiency' => '80+ Gold',
                'image' => 'https://via.placeholder.com/300x200?text=Corsair+850W',
                'specs' => ['850W', '80+ Gold', 'Fully Modular']
            ],
            [
                'id' => 'psu_2',
                'name' => 'EVGA SuperNOVA G6 1000W',
                'price' => 179.99,
                'wattage' => 1000,
                'efficiency' => '80+ Gold',
                'image' => 'https://via.placeholder.com/300x200?text=EVGA+1000W',
                'specs' => ['1000W', '80+ Gold', 'Fully Modular']
            ],
            [
                'id' => 'psu_3',
                'name' => 'SeaSonic Focus GX 750W',
                'price' => 124.99,
                'wattage' => 750,
                'efficiency' => '80+ Gold',
                'image' => 'https://via.placeholder.com/300x200?text=SeaSonic+750W',
                'specs' => ['750W', '80+ Gold', 'Fully Modular']
            ],
            [
                'id' => 'psu_4',
                'name' => 'ASUS ROG Thor 1200P 1200W',
                'price' => 259.99,
                'wattage' => 1200,
                'efficiency' => '80+ Platinum',
                'image' => 'https://via.placeholder.com/300x200?text=ASUS+1200W',
                'specs' => ['1200W', '80+ Platinum', 'Fully Modular']
            ]
        ]
    ],
    'case' => [
        'category' => 'PC Case',
        'components' => [
            [
                'id' => 'case_1',
                'name' => 'NZXT H510 Flow',
                'price' => 99.99,
                'form_factor' => 'ATX',
                'size' => 'Mid Tower',
                'image' => 'https://via.placeholder.com/300x200?text=H510+Flow',
                'specs' => ['Mid Tower', 'ATX', 'Tempered Glass']
            ],
            [
                'id' => 'case_2',
                'name' => 'Corsair 5000T RGB',
                'price' => 299.99,
                'form_factor' => 'ATX',
                'size' => 'Full Tower',
                'image' => 'https://via.placeholder.com/300x200?text=Corsair+5000T',
                'specs' => ['Full Tower', 'ATX', 'Premium Airflow']
            ],
            [
                'id' => 'case_3',
                'name' => 'LIAN LI Lancool 215',
                'price' => 49.99,
                'form_factor' => 'ATX',
                'size' => 'Mid Tower',
                'image' => 'https://via.placeholder.com/300x200?text=Lancool+215',
                'specs' => ['Mid Tower', 'ATX', 'Budget Friendly']
            ],
            [
                'id' => 'case_4',
                'name' => 'Fractal Design Torrent RGB',
                'price' => 249.99,
                'form_factor' => 'ATX',
                'size' => 'Mid Tower',
                'image' => 'https://via.placeholder.com/300x200?text=Torrent+RGB',
                'specs' => ['Mid Tower', 'ATX', 'Excellent Cooling']
            ]
        ]
    ],
    'cooling' => [
        'category' => 'CPU Cooler',
        'components' => [
            [
                'id' => 'cooling_1',
                'name' => 'Noctua NH-D15',
                'price' => 99.99,
                'type' => 'Air',
                'socket_support' => ['LGA1700', 'AM5'],
                'image' => 'https://via.placeholder.com/300x200?text=Noctua+D15',
                'specs' => ['Air Cooler', 'Dual Tower', 'LGA1700/AM5']
            ],
            [
                'id' => 'cooling_2',
                'name' => 'CORSAIR iCUE H150i Elite Capellix',
                'price' => 189.99,
                'type' => 'Liquid',
                'socket_support' => ['LGA1700', 'AM5'],
                'image' => 'https://via.placeholder.com/300x200?text=H150i+Elite',
                'specs' => ['360mm AIO', 'LGA1700/AM5', 'RGB']
            ],
            [
                'id' => 'cooling_3',
                'name' => 'Be Quiet! Dark Rock Pro 4',
                'price' => 89.99,
                'type' => 'Air',
                'socket_support' => ['LGA1700', 'AM5'],
                'image' => 'https://via.placeholder.com/300x200?text=Dark+Rock+Pro',
                'specs' => ['Air Cooler', 'Dual Tower', 'LGA1700/AM5']
            ],
            [
                'id' => 'cooling_4',
                'name' => 'LIAN LI GALAHAD 360 RGB',
                'price' => 149.99,
                'type' => 'Liquid',
                'socket_support' => ['LGA1700', 'AM5'],
                'image' => 'https://via.placeholder.com/300x200?text=GALAHAD+360',
                'specs' => ['360mm AIO', 'LGA1700/AM5', 'RGB']
            ]
        ]
    ]
];
