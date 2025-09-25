function getCookie(name) {
    const match = document.cookie.match(
        new RegExp("(^| )" + name + "=([^;]+)")
    );
    return match ? decodeURIComponent(match[2]) : null;
}

window.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.getElementById("task-table-body");
    if (!tableBody) return;
    let draggedRow = null;

    tableBody.addEventListener("dragstart", (e) => {
        draggedRow = e.target.closest("tr");
        e.dataTransfer.effectAllowed = "move";
    });

    tableBody.addEventListener("dragover", (e) => {
        e.preventDefault();
        const targetRow = e.target.closest("tr");
        if (targetRow && targetRow !== draggedRow) {
            const rect = targetRow.getBoundingClientRect();
            const offset = e.clientY - rect.top;
            if (offset > rect.height / 2) {
                targetRow.after(draggedRow);
            } else {
                targetRow.before(draggedRow);
            }
        }
    });

    tableBody.addEventListener("drop", async () => {
        const order = [...tableBody.querySelectorAll("tr")].map(
            (row, index) => ({
                id: row.dataset.id,
                priority: index + 1,
            })
        );

        try {
            await fetch("/api/tasks/reorder", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": getCookie("XSRF-TOKEN"),
                },
                body: JSON.stringify({ order }),
            });
            location.reload();
        } catch (error) {
            console.error("Reorder failed:", error);
        }
    });
});
