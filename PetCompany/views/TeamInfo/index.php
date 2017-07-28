<div id="before">

    <h2>Company before recruitment</h2>
    <h3>Candidates:</h3>

    <ol>
        <?php foreach ($this->beforeData->getCandidates() as $candidate): ?>
            <li><?= $candidate->getProfile() . ' ' . $candidate->getName() .
                ' with experience ' . $candidate->getExperience() . 'year(s), wants to get '
                . $candidate->getWantedSalary() . ' $'; ?></li>
        <?php endforeach; ?>
    </ol>


    <?php foreach ($this->beforeData->getTeams() as $team): ?>
        <h3><?php echo $team->getTeamName().':'; ?></h3>
        <h4>Needs:</h4>

        <ol>
            <?php foreach ($team->getNeeds() as $need): ?>
                <li><?= $need->getProfile() . ' is requierd with at least '
                    . $need->getExperience() . ' year(s) of experience. Proposed salary: '
                    . $need->getWantedSalary() . ' $';?></li>
            <?php endforeach; ?>
        </ol>
        <h4>Team members:</h4>

        <ol>
            <?php foreach ($team->getTeamMembers() as $tm): ?>
                <li><?= $tm->getPosition() . ' '
                    . $tm->getName() . ' with salary: '
                    . $tm->getSalary() . ' $';?></li>
            <?php endforeach; ?>

        </ol>
    <?php endforeach; ?>
</div>

<div id="after">

    <h2>Company after recruitment</h2>
    <h3>Candidates:</h3>

    <ol>
        <?php foreach ($this->afterData->getCandidates() as $candidate): ?>
            <li><?= $candidate->getProfile() . ' ' . $candidate->getName() .
                ' with experience ' . $candidate->getExperience() . 'year(s), wants to get '
                . $candidate->getWantedSalary() . ' $'; ?></li>
        <?php endforeach; ?>
    </ol>


    <?php foreach ($this->afterData->getTeams() as $team): ?>
        <h3><?php echo $team->getTeamName().':'; ?></h3>
        <h4>Needs:</h4>

        <ol>
            <?php foreach ($team->getNeeds() as $need): ?>
                <li><?= $need->getProfile() . ' is requierd with at least '
                    . $need->getExperience() . ' year(s) of experience. Proposed salary: '
                    . $need->getWantedSalary() . ' $';?></li>
            <?php endforeach; ?>
        </ol>
        <h4>Team members:</h4>

        <ol>
            <?php foreach ($team->getTeamMembers() as $tm): ?>
                <li><?= $tm->getPosition() . ' '
                    . $tm->getName() . ' with salary: '
                    . $tm->getSalary() . ' $';?></li>
            <?php endforeach; ?>

        </ol>
    <?php endforeach; ?>

</div>
<div id="clear"></div>
