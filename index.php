<?php

require_once "conn.php";
$query = "select * from customers";
$result = mysqli_query($connect, $query);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Directory</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <style>
        :root {
            --ink: #1d2939;
            --muted: #667085;
            --accent: #6258d9;
            --accent-dark: #4d43c4;
            --line: #e9edf4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            padding: clamp(1.25rem, 5vw, 4.5rem) 1rem;
            color: var(--ink);
            background:
                radial-gradient(ellipse at 12% 0%, rgba(98, 88, 217, 0.16), transparent 34rem),
                radial-gradient(ellipse at 100% 15%, rgba(75, 190, 177, 0.12), transparent 28rem),
                #f5f7fb;
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .customer-card {
            max-width: 1320px;
            margin: 0 auto;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 242, 0.9);
            border-radius: 1.35rem;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 1.5rem 4rem rgba(35, 47, 82, 0.11);
        }

        .customer-card__header {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            grid-template-rows: auto auto;
            align-items: center;
            column-gap: 2rem;
            padding: clamp(1.5rem, 4vw, 2.5rem);
            border-bottom: 1px solid var(--line);
            background:
                linear-gradient(115deg, rgba(98, 88, 217, 0.055), transparent 55%),
                #fff;
        }

        .customer-card__header h1 {
            grid-column: 1;
            grid-row: 1;
            margin: 0;
            color: #202746;
            font-size: clamp(1.6rem, 4vw, 2.2rem);
            font-weight: 700;
            letter-spacing: -0.045em;
        }

        .customer-card__header p {
            grid-column: 1;
            grid-row: 2;
            margin: 0.55rem 0 0;
            color: var(--muted);
            font-size: 0.98rem;
        }

        .customer-card__header > div {
            grid-column: 2;
            grid-row: 1 / span 2;
            margin: 0;
        }

        .customer-card__header > div a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0.75rem 1.25rem;
            border: 1px solid #5147c8;
            border-radius: 0.8rem;
            color: #fff;
            background: linear-gradient(135deg, #756be8 0%, #5147c8 100%);
            box-shadow: 0 0.55rem 1.15rem rgba(98, 88, 217, 0.24);
            font-size: 0.9rem;
            font-weight: 650;
            text-decoration: none;
            transition: transform 160ms ease, box-shadow 160ms ease;
        }

        .customer-card__header > div a:hover {
            transform: translateY(-2px);
            border-color: #4036b2;
            color: #fff;
            background: linear-gradient(135deg, #665cdb 0%, #4036b2 100%);
            box-shadow: 0 0.8rem 1.4rem rgba(98, 88, 217, 0.3);
        }

        .customer-card__header > div a:focus-visible,
        .customer-table tbody a:focus-visible {
            outline: 3px solid rgba(98, 88, 217, 0.35);
            outline-offset: 3px;
        }

        .customer-table-wrap {
            padding: 1.1rem clamp(0.75rem, 3vw, 1.75rem) 1.5rem;
        }

        .customer-table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0 0.35rem;
        }

        .customer-table thead th {
            padding: 0.9rem 1rem;
            border: 0;
            color: #7a8499;
            background: #f7f8fc;
            font-size: 0.72rem;
            font-weight: 750;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .customer-table thead th:first-child {
            border-top-left-radius: 0.65rem;
        }

        .customer-table thead th:last-child {
            border-top-right-radius: 0.65rem;
        }

        .customer-table tbody td {
            padding: 1rem;
            border-top: 1px solid #edf0f5;
            border-bottom: 1px solid #edf0f5;
            color: #3f4a60;
            vertical-align: middle;
        }

        .customer-table tbody td:first-child {
            border-left: 1px solid #edf0f5;
            border-radius: 0.75rem 0 0 0.75rem;
            color: #7c879c;
            font-variant-numeric: tabular-nums;
            font-weight: 650;
        }

        .customer-table tbody td:last-child {
            border-right: 1px solid #edf0f5;
            border-radius: 0 0.75rem 0.75rem 0;
        }

        .customer-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .customer-table tbody tr {
            transition: filter 160ms ease, transform 160ms ease;
        }

        .customer-table tbody tr:hover {
            filter: drop-shadow(0 0.35rem 0.55rem rgba(41, 53, 90, 0.07));
            transform: translateY(-1px);
        }

        .customer-table tbody tr:hover td {
            border-color: #e3e3fb;
            background: #fbfaff;
        }

        .customer-table tbody td:nth-child(2),
        .customer-table tbody td:nth-child(3) {
            color: #28334a;
            font-weight: 600;
        }

        .customer-table tbody td:nth-last-child(2) a,
        .customer-table tbody td:last-child a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 68px;
            padding: 0.45rem 0.65rem;
            border: 1px solid #e4e5fb;
            border-radius: 0.55rem;
            color: #554bc5;
            background: #f5f4ff;
            font-size: 0.82rem;
            font-weight: 650;
            text-decoration: none;
            transition: background-color 150ms ease, border-color 150ms ease;
        }

        .customer-table tbody td:nth-last-child(2) a:hover {
            border-color: #d5d2fb;
            background: #ebeaff;
        }

        .customer-table tbody td:last-child a {
            border-color: #f6dfe2;
            color: #b54755;
            background: #fff6f6;
        }

        .customer-table tbody td:last-child a:hover {
            border-color: #f1cbd0;
            background: #ffebed;
        }

        .customer-pagination-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.1rem clamp(1rem, 3vw, 1.75rem);
            border-top: 1px solid var(--line);
            background: #fcfcfe;
        }

        .customer-pagination-info {
            color: var(--muted);
            font-size: 0.86rem;
        }

        .customer-pagination {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .customer-pagination button {
            display: grid;
            min-width: 2.4rem;
            height: 2.4rem;
            place-items: center;
            padding: 0 0.6rem;
            border: 1px solid #e5e8f0;
            border-radius: 0.65rem;
            color: #566177;
            background: #fff;
            font: inherit;
            font-size: 0.85rem;
            font-weight: 600;
            transition: border-color 150ms ease, background-color 150ms ease, color 150ms ease;
        }

        .customer-pagination button:hover:not(:disabled) {
            border-color: #cbc8f3;
            color: var(--accent-dark);
            background: #f5f4ff;
        }

        .customer-pagination button[aria-current="page"] {
            border-color: var(--accent);
            color: #fff;
            background: linear-gradient(135deg, #756be8, var(--accent));
            box-shadow: 0 0.3rem 0.75rem rgba(98, 88, 217, 0.2);
        }

        .customer-pagination button:disabled {
            cursor: not-allowed;
            color: #b6bdca;
            background: #f6f7f9;
        }

        .customer-pagination-ellipsis {
            padding: 0 0.15rem;
            color: #98a1b2;
        }

        @media (max-width: 575.98px) {
            body {
                padding: 1rem 0.65rem;
            }

            .customer-card__header {
                grid-template-columns: minmax(0, 1fr);
                row-gap: 0.35rem;
            }

            .customer-card__header > div {
                grid-column: 1;
                grid-row: 3;
                margin-top: 0.85rem;
            }

            .customer-table-wrap {
                padding: 0.75rem 0.65rem 0.85rem;
            }

            .customer-table thead th,
            .customer-table tbody td {
                padding: 0.8rem 0.75rem;
            }

            .customer-card__header > div a {
                width: 100%;
            }

            .customer-pagination-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .customer-pagination {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <main class="customer-card">
        <header class="customer-card__header">
            <h1>Customer Directory</h1>
            <p>Browse your customer information.</p>
            <div class="text-center text-decoration-none"><a href="formInsert.php">Insert Data</a></div>
        </header>
        <div class="table-responsive customer-table-wrap">
            <table class="table customer-table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">fName</th>
                        <th scope="col">lName</th>
                        <th scope="col">email</th>
                        <th scope="col">gender</th>
                        <th scope="col">country</th>
                        <th scope="col">city</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $customer["firstName"] ?></td>
                            <td><?= $customer["lastName"] ?></td>
                            <td><?= $customer["email"] ?></td>
                            <td><?= $customer["gender"] ?></td>
                            <td><?= $customer["country"] ?></td>
                            <td><?= $customer["city"] ?></td>
                            <td><a href="formUpdate.php?id=<?= $customer["customerId"] ?>">Update</a></td>
                            <td><a href="handle/handleDelete.php?id=<?= $customer["customerId"] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        (() => {
            const tableBody = document.querySelector(".customer-table tbody");
            const tableContainer = document.querySelector(".customer-table-wrap");
            const customerRows = tableBody ? Array.from(tableBody.querySelectorAll("tr")) : [];
            const pageSize = 10;

            if (!tableBody || !tableContainer || customerRows.length <= pageSize) {
                return;
            }

            const totalPages = Math.ceil(customerRows.length / pageSize);
            let currentPage = 1;

            const footer = document.createElement("footer");
            footer.className = "customer-pagination-footer";
            const info = document.createElement("div");
            info.className = "customer-pagination-info";
            const navigation = document.createElement("nav");
            navigation.setAttribute("aria-label", "Customer pages");
            const pagination = document.createElement("ul");
            pagination.className = "customer-pagination";
            navigation.appendChild(pagination);
            footer.append(info, navigation);
            tableContainer.insertAdjacentElement("afterend", footer);

            const makePageButton = (label, page, options = {}) => {
                const item = document.createElement("li");
                const button = document.createElement("button");
                button.type = "button";
                button.textContent = label;
                button.disabled = Boolean(options.disabled);
                if (options.current) {
                    button.setAttribute("aria-current", "page");
                    button.setAttribute("aria-label", `Page ${page}, current page`);
                } else {
                    button.setAttribute("aria-label", options.ariaLabel || `Go to page ${page}`);
                }
                button.addEventListener("click", () => {
                    currentPage = page;
                    renderPage();
                });
                item.appendChild(button);
                pagination.appendChild(item);
            };

            const makeEllipsis = () => {
                const item = document.createElement("li");
                item.className = "customer-pagination-ellipsis";
                item.textContent = "…";
                item.setAttribute("aria-hidden", "true");
                pagination.appendChild(item);
            };

            const renderPage = () => {
                const firstRow = (currentPage - 1) * pageSize;
                const lastRow = Math.min(firstRow + pageSize, customerRows.length);
                customerRows.forEach((row, index) => {
                    row.style.display = index >= firstRow && index < lastRow ? "" : "none";
                });
                info.textContent = `Showing ${firstRow + 1}–${lastRow} of ${customerRows.length} customers`;
                pagination.replaceChildren();

                makePageButton("‹", Math.max(1, currentPage - 1), {
                    disabled: currentPage === 1,
                    ariaLabel: "Previous page"
                });

                const startPage = Math.max(2, currentPage - 1);
                const endPage = Math.min(totalPages - 1, currentPage + 1);
                makePageButton("1", 1, { current: currentPage === 1 });

                if (startPage > 2) {
                    makeEllipsis();
                }

                for (let page = startPage; page <= endPage; page++) {
                    makePageButton(String(page), page, { current: page === currentPage });
                }

                if (endPage < totalPages - 1) {
                    makeEllipsis();
                }

                makePageButton(String(totalPages), totalPages, {
                    current: currentPage === totalPages
                });
                makePageButton("›", Math.min(totalPages, currentPage + 1), {
                    disabled: currentPage === totalPages,
                    ariaLabel: "Next page"
                });
            };

            renderPage();
        })();
    </script>
</body>
</html>
