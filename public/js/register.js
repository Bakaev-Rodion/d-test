document.addEventListener('DOMContentLoaded', function () {
    const options = {
        buyer: document.getElementById('radioBuyer'),
        teamLead: document.getElementById('radioTeamlead'),
        admin: document.getElementById('radioAdmin')
    };
    const teamNameField = document.getElementById('fieldTeamName');
    const teamNameInput = document.getElementById('teamName');
    const teamSelector = document.getElementById('teamSelector');
    const teamSelectorInput = document.getElementById('team');

    const toggleVisibility = (element, isVisible) => {
        element.value = '';
        element.style.display = isVisible ? 'block' : 'none';
    };

    const handleOptionChange = () => {
        const isBuyer = options.buyer.checked;
        const isTeamLead = options.teamLead.checked;

        toggleVisibility(teamSelector, isBuyer);
        toggleVisibility(teamNameField, isTeamLead);

        if (!isBuyer) {
            toggleVisibility(teamSelector, false);
            teamSelectorInput.value = '';
        }

        if (!isTeamLead) {
            toggleVisibility(teamNameField, false);
            teamNameInput.value = '';
        }

    };

    Object.values(options).forEach(option => {
        option.addEventListener('change', handleOptionChange);
    });

    handleOptionChange();
});
