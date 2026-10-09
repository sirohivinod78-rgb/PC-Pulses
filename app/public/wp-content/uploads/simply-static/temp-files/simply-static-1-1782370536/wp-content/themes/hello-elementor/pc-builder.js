/**
 * PC Builder Interactive System
 * Handles component selection, compatibility checking, and build summary
 */

class PCBuilder {
    constructor(componentsData) {
        this.components = componentsData;
        this.selectedBuild = {};
        this.compatibilityIssues = [];
        this.init();
    }

    init() {
        this.renderComponentCategories();
        this.attachEventListeners();
        this.updateBuildSummary();
    }

    renderComponentCategories() {
        const container = document.getElementById('pc-builder-components');
        if (!container) return;

        Object.entries(this.components).forEach(([categoryKey, categoryData]) => {
            const categorySection = this.createCategorySection(categoryKey, categoryData);
            container.appendChild(categorySection);
        });
    }

    createCategorySection(categoryKey, categoryData) {
        const section = document.createElement('div');
        section.className = 'pc-builder-category';
        section.id = `category-${categoryKey}`;

        const title = document.createElement('h3');
        title.className = 'category-title';
        title.textContent = categoryData.category;

        const componentsGrid = document.createElement('div');
        componentsGrid.className = 'components-grid';

        categoryData.components.forEach(component => {
            const card = this.createComponentCard(categoryKey, component);
            componentsGrid.appendChild(card);
        });

        section.appendChild(title);
        section.appendChild(componentsGrid);
        return section;
    }

    createComponentCard(categoryKey, component) {
        const card = document.createElement('div');
        card.className = 'component-card';
        card.dataset.componentId = component.id;
        card.dataset.categoryKey = categoryKey;

        const isSelected = this.selectedBuild[categoryKey]?.id === component.id;
        if (isSelected) {
            card.classList.add('selected');
        }

        card.innerHTML = `
            <div class="component-image">
                <img src="${component.image}" alt="${component.name}" onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
            </div>
            <div class="component-info">
                <h4 class="component-name">${component.name}</h4>
                <ul class="component-specs">
                    ${component.specs.map(spec => `<li>${spec}</li>`).join('')}
                </ul>
                <div class="component-price">$${component.price.toFixed(2)}</div>
            </div>
            <button class="select-btn" data-component-id="${component.id}">
                ${isSelected ? 'Selected' : 'Select'}
            </button>
        `;

        return card;
    }

    attachEventListeners() {
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('select-btn')) {
                const componentId = e.target.dataset.componentId;
                const categoryKey = e.target.closest('.component-card').dataset.categoryKey;
                const component = this.findComponent(componentId);
                
                if (component) {
                    this.selectComponent(categoryKey, component);
                }
            }
        });
    }

    findComponent(componentId) {
        for (const categoryData of Object.values(this.components)) {
            const found = categoryData.components.find(c => c.id === componentId);
            if (found) return found;
        }
        return null;
    }

    selectComponent(categoryKey, component) {
        // Update selection
        this.selectedBuild[categoryKey] = component;

        // Update UI
        this.updateCategoryUI(categoryKey);
        this.checkCompatibility();
        this.updateBuildSummary();

        // Scroll to summary
        const summary = document.getElementById('pc-builder-summary');
        if (summary) {
            summary.scrollIntoView({ behavior: 'smooth' });
        }
    }

    updateCategoryUI(categoryKey) {
        const cards = document.querySelectorAll(`[data-category-key="${categoryKey}"] .component-card`);
        cards.forEach(card => {
            const selectedId = this.selectedBuild[categoryKey]?.id;
            const isSelected = card.dataset.componentId === selectedId;

            if (isSelected) {
                card.classList.add('selected');
                card.querySelector('.select-btn').textContent = 'Selected';
            } else {
                card.classList.remove('selected');
                card.querySelector('.select-btn').textContent = 'Select';
            }
        });
    }

    checkCompatibility() {
        this.compatibilityIssues = [];

        // CPU Socket Compatibility
        const cpu = this.selectedBuild.cpu;
        const motherboard = this.selectedBuild.motherboard;

        if (cpu && motherboard && cpu.socket !== motherboard.socket) {
            this.compatibilityIssues.push({
                level: 'error',
                message: `CPU Socket Mismatch: ${cpu.socket} CPU requires ${cpu.socket} socket, but motherboard has ${motherboard.socket}`
            });
        }

        // RAM Type Compatibility
        const ram = this.selectedBuild.ram;
        if (motherboard && ram && motherboard.ram_type !== ram.type) {
            this.compatibilityIssues.push({
                level: 'error',
                message: `RAM Compatibility Issue: Motherboard supports ${motherboard.ram_type}, but you selected ${ram.type}`
            });
        }

        // Power Supply Wattage Check
        const psu = this.selectedBuild.psu;
        const gpu = this.selectedBuild.gpu;
        const cpuPower = cpu?.tdp || 0;
        const gpuPower = gpu?.power_req || 0;
        const totalPower = cpuPower + gpuPower + 150; // 150W for other components

        if (psu && psu.wattage < totalPower * 1.2) { // 20% headroom recommended
            this.compatibilityIssues.push({
                level: 'warning',
                message: `PSU Capacity Warning: Your build requires ~${Math.round(totalPower)}W, but PSU is ${psu.wattage}W. Consider upgrading for stability.`
            });
        }

        // CPU Cooler Socket Support
        const cooling = this.selectedBuild.cooling;
        if (cpu && cooling) {
            const coolerSupports = cooling.socket_support || [];
            if (!coolerSupports.includes(cpu.socket)) {
                this.compatibilityIssues.push({
                    level: 'error',
                    message: `Cooler Compatibility: Selected cooler doesn't support ${cpu.socket} socket`
                });
            }
        }

        this.displayCompatibilityWarnings();
    }

    displayCompatibilityWarnings() {
        const warningContainer = document.getElementById('compatibility-warnings');
        if (!warningContainer) return;

        warningContainer.innerHTML = '';

        if (this.compatibilityIssues.length === 0) {
            warningContainer.innerHTML = '<div class="compatibility-ok">✓ All components are compatible!</div>';
            return;
        }

        this.compatibilityIssues.forEach(issue => {
            const warning = document.createElement('div');
            warning.className = `compatibility-warning ${issue.level}`;
            warning.innerHTML = `
                <span class="warning-icon">⚠</span>
                <span class="warning-text">${issue.message}</span>
            `;
            warningContainer.appendChild(warning);
        });
    }

    updateBuildSummary() {
        const summary = document.getElementById('build-summary-items');
        if (!summary) return;

        summary.innerHTML = '';
        let totalPrice = 0;
        let itemCount = 0;

        Object.entries(this.selectedBuild).forEach(([categoryKey, component]) => {
            const categoryName = this.components[categoryKey]?.category || categoryKey;
            totalPrice += component.price;
            itemCount++;

            const item = document.createElement('div');
            item.className = 'build-summary-item';
            item.innerHTML = `
                <div class="summary-item-info">
                    <div class="summary-category">${categoryName}</div>
                    <div class="summary-name">${component.name}</div>
                </div>
                <div class="summary-item-price">$${component.price.toFixed(2)}</div>
                <button class="remove-btn" data-category="${categoryKey}">Remove</button>
            `;

            item.querySelector('.remove-btn').addEventListener('click', () => {
                delete this.selectedBuild[categoryKey];
                this.updateCategoryUI(categoryKey);
                this.checkCompatibility();
                this.updateBuildSummary();
            });

            summary.appendChild(item);
        });

        // Update progress indicator
        const totalCategories = Object.keys(this.components).length;
        const progress = (itemCount / totalCategories) * 100;
        const progressBar = document.querySelector('.progress-bar-fill');
        if (progressBar) {
            progressBar.style.width = progress + '%';
        }

        const progressText = document.querySelector('.progress-text');
        if (progressText) {
            progressText.textContent = `${itemCount}/${totalCategories} Components Selected`;
        }

        // Update total price
        const totalElement = document.getElementById('build-total-price');
        if (totalElement) {
            totalElement.textContent = `$${totalPrice.toFixed(2)}`;
        }

        // Update empty state
        if (itemCount === 0) {
            summary.innerHTML = '<div class="empty-build">Select components to build your PC</div>';
        }
    }

    exportBuild() {
        const buildData = {
            timestamp: new Date().toISOString(),
            components: this.selectedBuild,
            totalPrice: this.getTotalPrice(),
            compatibility: this.compatibilityIssues
        };

        return JSON.stringify(buildData, null, 2);
    }

    getTotalPrice() {
        return Object.values(this.selectedBuild).reduce((sum, component) => sum + component.price, 0);
    }

    resetBuild() {
        this.selectedBuild = {};
        this.compatibilityIssues = [];
        
        // Update all category UIs
        Object.keys(this.components).forEach(categoryKey => {
            this.updateCategoryUI(categoryKey);
        });

        this.checkCompatibility();
        this.updateBuildSummary();
    }
}

// Initialize builder when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    if (window.pcBuilderComponents) {
        window.pcBuilder = new PCBuilder(window.pcBuilderComponents);
    }
});
